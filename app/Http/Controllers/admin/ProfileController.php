<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Validator;
use Auth;

//All Models
use App\User;

class ProfileController extends Controller
{
    public function editProfile(Request $request){
        $id = auth::user()->id;
        return User::find($id);
    }

    public function saveProfile(Request $request){

        $id = auth::user()->id;
        $userModel = User::find($id);
        $data = $request->only([
           'first_name','last_name','email','phone','gender',
           'dob','city','state','country','zip','image'
        ]);
        //var_dump($data);die;;
        $validator = Validator::make($data,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone' => 'required|numeric|min:10',
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
                request()->image->move(public_path('uploads/users'), $imageName);
                $data['profile_photo'] = 'uploads/users/'.$imageName;
            }
            $data['dob'] = ($data['dob']!=NULL)?date('Y-m-d',strtotime($data['dob'])):'';
            $res = $userModel->update($data);
            if($res){
                return response()->json([
                    'status' => true,
                    'message'=>'Profile updated successfully'
                ]);
            }
        }

    }


    public function changePassword(Request $request){

        $id = auth::user()->id;
        $userModel = User::find($id);
        $data = $request->only(['old_password','new_password','new_password_confirmation']);
        //var_dump($data);die;;
        $validator = Validator::make($data,[
            'old_password' => 'required|min:6',
            'new_password' => 'required|min:6|confirmed',
            'new_password_confirmation' => 'required|min:6'
        ],
        [
            'confirmed' => 'New password & confirm new password does not match'
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
            if (!(Hash::check($data['old_password'], Auth::user()->password))) {
                return response()->json([
                    'status' => false,
                    'message'=>'Please correct form values',
                    'errors' => [
                        'old_password' => 'Incorrect old password'
                    ]
                ]);
            }else{

                $updated = $userModel->update(['password' => (Hash::make($data['new_password']))]);
                if($updated){
                    return response()->json([
                        'status' => true,
                        'message'=>'Your password changed successfully'
                    ]);
                }else{
                    return response()->json([
                        'status' => false,
                        'message'=>'Error in update new password'
                    ]);

                }

            }

        }

    }



}
