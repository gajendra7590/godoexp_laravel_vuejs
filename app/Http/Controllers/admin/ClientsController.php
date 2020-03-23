<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

//All Models
use App\User;

class ClientsController extends Controller
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
        $clients = User::select(['id','first_name','last_name','email','profile_photo','phone','gender',
            'role_id','last_login','status','created_at','updated_at'])
            ->with(['role' => function($model){ $model->select('id','role_name'); }])
            ->where('status','!=','2')    
            ->where('role_id','3')       
            ->orderBy('id','DESC')
            ->offset($offset)
            ->limit($limit)
            ->get();
        return ['clients'=>$clients,'total'=> $total,'total_pages' => $total_pages];
    }

    protected function getCount(){
        return User::select(['id'])
            ->where('status','!=','2')    
            ->where('role_id','3')     
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'image' => 'mimes:jpeg,jpg,png'
        ]);
        if($validator->fails()){
            $errors = $validator->errors();
            return response()->json([
                'status'=>false,
                'message'=>'Please correct form values',
                'result'=>[
                    'data' => [],
                    'errors' => $errors
                ]
            ]);
        }else{

            if($request->hasFile('image')){
                $imageName = time().'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('uploads/users'), $imageName);
                $data['profile_photo'] = 'uploads/users/'.$imageName;   
            } 
             
            $data['password'] = Hash::make($data['password']);
            $data['role_id'] = 3; 
            $res = User::create($data);
            if($res){
                return response()->json([
                    'status' => true,
                    'message'=>'New client created successfully'
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
        $user = User::select(['*'])
                ->where(['id' => $id])
                ->where(['role_id' => '3'])
                ->where('status','!=','2') 
                ->first();
        if(!$user){
            return response()->json([
                'status' => false,
                'message'=>'USER ID NOT FOUND'
            ]);
        }
        return $user;
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
        $model = User::where('id',$id)
        ->where(['role_id' => '3'])
        ->where('status','!=','2')->get()->first();
        if(!$model){
            return response()->json([
                'status' => false,
                'message' => 'Invalid Client ID'
            ]);
        }

        $data = $request->all();
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'min:8',
            'image' => 'mimes:jpeg,jpg,png'
        ]);
        if($validator->fails()){
            $errors = $validator->errors();
            return response()->json([
                'status'=>false,
                'message'=>'Please correct form values',
                'result'=>[
                    'data' => [],
                    'errors' => $errors
                ]
            ]);
        }else{

            if($request->hasFile('image')){
                $imageName = time().'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('uploads/users'), $imageName);
                $data['profile_photo'] = 'uploads/users/'.$imageName;   
            } 

            //If Password set
            if($data['password']!=''){
                $data['password'] = Hash::make($data['password']);
            } 
             
            $res = $model->update($data);
            if($res){
                return response()->json([
                    'status' => true,
                    'message'=>'client detail updated successfully'
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
        $model = User::where('id',$id)
        ->where(['role_id' => '3'])
        ->where('status','!=','2')->get()->first(); 
        if(!$model){
            return response()->json([
                'status' => false,
                'message' => 'Invalid Client ID'
            ]);
        }

        $res = $model->update(['status'=>'2']);
        if($res){
            return response()->json([
                'status' => true,
                'message'=>'Client archieved successfully'
            ]);
        }
    }
}
