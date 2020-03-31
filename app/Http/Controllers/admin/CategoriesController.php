<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

//All Models
use App\models\Categories;

class CategoriesController extends Controller
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
        $categories = Categories::select(['id','name','title','description','category_image_url','slug','status','created_at','updated_at'])
            ->where(['status'=>'1'])
            ->orWhere(['status'=>'0'])
            ->orderBy('id','DESC')
            ->offset($offset)
            ->limit($limit)
            ->get();
        return ['categories'=>$categories,'total'=> $total,'total_pages' => $total_pages];
    }

    protected function getCount(){
        return Categories::select(['id'])
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
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'title' => 'required',
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
            request()->image->move(public_path('uploads/categories'), $imageName);
            $data['category_image_url'] = 'uploads/categories/'.$imageName;

            $slug = strtolower(preg_replace('/\s+/', '-', $data['name']));
            $data['slug'] = $slug;

            if( isset($data['featured']) && $data['featured'] == 'on'){
                $data['featured'] = 1;
            }else{ $data['featured'] = 0; }


            $res = Categories::create($data);
            if($res){
                return response()->json([
                    'status' => true,
                    'message'=>'New category added successfully'
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
        $category = Categories::select(['id','name','description','featured','category_image_url','title','slug','status','created_at','updated_at'
        ])->where(['id' => $id, 'status' => '1'])->orWhere(['status' => '0'])->first();
        if(!$category){
            return response()->json([
                'status' => false,
                'message'=>'Category ID NOT FOUND'
            ]);
        }
        return $category;
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
         $model = Categories::find($id);
         if(!$model){
             return response()->json([
                 'status' => false,
                 'message' => 'Invalid Category ID'
             ]);
         }

         $data = $request->all();
         $validator = Validator::make($request->all(),[
             'name' => 'required',
             'title' => 'required',
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

             if( isset($data['featured']) && $data['featured'] == 'on'){
                $data['featured'] = 1;
             }else{ $data['featured'] = 0; }

             if($request->hasFile('image')){
                 $imageName = time().'.'.request()->image->getClientOriginalExtension();
                 request()->image->move(public_path('uploads/categories'), $imageName);
                 $data['category_image_url'] = 'uploads/categories/'.$imageName;
             }

             $slug = strtolower(preg_replace('/\s+/', '-', $data['name']));
             $data['slug'] = $slug;

             $res = $model->update($data);
             if($res){
                 return response()->json([
                     'status' => true,
                     'message'=>'Category updated successfully'
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
        $model = Categories::find($id);
        if(!$model){
            return response()->json([
                'status' => false,
                'message' => 'Invalid Category ID'
            ]);
        }

        $res = $model->update(['status'=>'2']);
        if($res){
            return response()->json([
                'status' => true,
                'message'=>'Category archieved successfully'
            ]);
        }
    }
}
