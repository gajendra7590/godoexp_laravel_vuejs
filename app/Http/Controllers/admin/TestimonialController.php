<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

//All Models
use App\models\Testimonial;

class TestimonialController extends Controller
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
        $limit = 8;
        $total_pages = ceil( $total/$limit );
        $offset = ( ($pageNum - 1) * $limit);
        // echo $offset;die;
        $testimonial = Testimonial::select(['*'])
            ->orderBy('id','DESC')
            ->offset($offset)
            ->limit($limit)
            ->get();
        return ['testimonial'=>$testimonial,'total'=> $total,'total_pages' => $total_pages];
    }

    protected function getCount(){
        return Testimonial::select(['id'])
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
        $validator = Validator::make($request->all(),[
            'client_name' => 'required',
            'client_position' => 'required',
            'client_message' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png'
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
            request()->image->move(public_path('uploads/testimonial'), $imageName);
            $data['client_image'] = 'uploads/testimonial/'.$imageName;
            $res = Testimonial::create($data);
            if($res){
                return response()->json([
                    'status' => true,
                    'message'=>'New testimonial added successfully'
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
        $testimonial = Testimonial::select(['*'])
            ->where(['id' => $id])
            ->first();
        if(!$testimonial){
            return response()->json([
                'status' => false,
                'message'=>'Testimonial ID NOT FOUND'
            ]);
        }
        return $testimonial;
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
        $model = Testimonial::find($id);
         if(!$model){
             return response()->json([
                 'status' => false,
                 'message' => 'Invalid Testimonial ID'
             ]);
         }

         $data = $request->all();
         $validator = Validator::make($request->all(),[
            'client_name' => 'required',
            'client_position' => 'required',
            'client_message' => 'required',
            'image' => 'mimes:jpeg,jpg,png'
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
                    request()->image->move(public_path('uploads/testimonial'), $imageName);
                    $data['client_image'] = 'uploads/testimonial/'.$imageName;
             }

             $res = $model->update($data);
             if($res){
                 return response()->json([
                     'status' => true,
                     'message'=>'Category testimonial successfully'
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
        $model = Testimonial::find($id);
        if(!$model){
            return response()->json([
                'status' => false,
                'message' => 'Invalid Testimonial ID'
            ]);
        }

        $res = $model->delete();
        if($res){
            return response()->json([
                'status' => true,
                'message'=>'Testimonial deleted successfully'
            ]);
        }
    }
}
