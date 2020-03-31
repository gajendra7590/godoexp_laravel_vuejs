<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

//All Models
use App\models\Experiences;
use App\Models\Categories;

class ExperiencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pageNum = ($request->get('page'))?$request->get('page'):1;
        $total = $this->getCount();
        $limit = 10;
        $total_pages = ceil($total/$limit);
        $offset = ( ($pageNum - 1) * $limit);

        $experiences  = Experiences::with([
            'user' => function($model){
                $model->select(['id','first_name','last_name','email']);
            },
            'category' => function($model){
                $model->select(['id','name','title']);
            }
        ])
        ->where('status', '1')
        ->orWhere('status' ,'0')
        ->orderBy('id','DESC')
        ->offset($offset)
        ->limit($limit)
        ->get();

        return ['experiences'=>$experiences,'total'=> $total,'total_pages' => $total_pages];
    }

    public function categories(Request $request){
        return Categories::select(['id','name'])
            ->where('status','1')
            ->orWhere('status','0')
            ->get()
            ->all();
    }


    protected function getCount(){
        return Experiences::select(['id'])
            ->where('status','1')
           ->orWhere('status','0')
            ->get()
            ->count();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
       // echo '<pre>';print_r( $data );die;
        $validator = Validator::make($request->all(),[
            'category_id' => 'required|numeric',
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
            'price' => 'required|numeric',
            'duration' => 'required|numeric',
            'duration_type' => 'required',
            'group_size' => 'required|numeric',
            'activity_level' => 'required',
        ]);
        if($validator->fails()){
            $errors = $validator->errors();
            $errors = errorArrayCreate($errors);
            return response()->json([
                'status'=>false,
                'message'=>'Please correct form values',
                'errors' => $errors
            ]);
        }else{

            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads/experiences'), $imageName);
            $data['experiences_image_url'] = 'uploads/experiences/'.$imageName;
            $data['user_id'] = 8;

            $slug = strtolower(preg_replace('/\s+/', '-', $data['title']));
            $data['slug'] = $slug;

            if( isset($data['featured']) && $data['featured'] == 'on'){
                $data['featured'] = 1;
            }else{ $data['featured'] = 0; }

            $res = Experiences::create($data);
            if($res){
                return response()->json([
                    'status' => true,
                    'message'=>'New experience added successfully'
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Experiences::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Experiences::find($id);
        if(!$model){
            return response()->json([
                'status' => false,
                'message' => 'Invalid Experience ID'
            ]);
        }

        $data = $request->all();
        $validator = Validator::make($request->all(),[
            'category_id' => 'required|numeric',
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
            'price' => 'required|numeric',
            'duration' => 'required|numeric',
            'duration_type' => 'required',
            'group_size' => 'required|numeric',
            'activity_level' => 'required',
        ]);
        if($validator->fails()){
            $errors = $validator->errors();
            $errors = errorArrayCreate($errors);
            return response()->json([
                'status'=>false,
                'message'=>'Please correct form values',
                'errors' => $errors
            ]);
        }else{
            if($request->hasFile('image')){
                $imageName = time().'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('uploads/experiences'), $imageName);
                $data['experiences_image_url'] = 'uploads/experiences/'.$imageName;
            }

//            var_dump($data);die;
            if( isset($data['featured']) && $data['featured'] == 'on'){
                $data['featured'] = 1;
            }else{ $data['featured'] = 0; }

            $slug = strtolower(preg_replace('/\s+/', '-', $data['title']));
            $data['slug'] = $slug;

            $res = $model->update($data);
            if($res){
                return response()->json([
                    'status' => true,
                    'message'=>'Experience updated successfully'
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Experiences::find($id);
        if(!$model){
            return response()->json([
                'status' => false,
                'message' => 'Invalid Experience ID'
            ]);
        }
        $update = $model->update(['status' => 2]);
        if($update){
            return response()->json([
                'status' => true,
                'message'=>'Experience archieved successfully'
            ]);
        }
    }
}
