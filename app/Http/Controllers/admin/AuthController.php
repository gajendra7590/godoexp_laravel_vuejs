<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
//All Models
use App\User;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $validator = Validator::make($request->all(),[
            'email' => ['required','email'],
            'password' => ['required'],
        ]);
        if($validator->fails()){
            $allMessages = $validator->messages();
            $result = errorArrayCreate($allMessages);
            return response()->json([
                'status'=>false,
                'message'=>'Please correct form values',
                'errors' => $result
            ]);
        }
        if (Auth::attempt($credentials)) {
            $user = $request->user();
            if($user->active == '0'){
                return response()->json([
                    'status'=>false,
                    'message'=>'Your account is not activated by you,please activate via activation link
                                OR contact us',
                    'result'=>[
                        'data' => [],
                        'errors' => null
                    ]
                ]);
            }
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            if ($request->remember_me)
                $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();
            return response()->json([
                'status'=>true,
                'message'=>'You have logged in successfully',
                'user' => auth()->user()->userName,
                'token'=>[
                    'access_token' => $tokenResult->accessToken,
                    'token_type' => 'Bearer',
                    'expires_at' => Carbon::parse(
                        $tokenResult->token->expires_at
                    )->toDateTimeString()
                ],
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'User name OR password is invalid'
            ]);
        }
    }

    public function register(Request $request){

        $post = $request->only('first_name','last_name','email','password');
        $validator = Validator::make($post,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
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

            $post['password'] = Hash::make($post['password']);
            $post['role_id'] = 3;
            $post['status'] = 1;
            $user = User::create($post);
            if($user){
                $token = $user->createToken('Access Token')->accessToken;
                return response()->json([
                    'status' => true,
                    'user' => $user,
                    'access_token' => $token
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message'=>'Error in create account'
                ]);
            }
        }

    }

    public function logout(Request $request){
        if(auth()->user()){

            $get = auth()->user()->tokens->each(function($token,$key){
                $token->delete();
            });

            return response()->json([
                'status' => true,
                'message'=>'You have benn logged out successfully'
            ]);
        }else{
            return response()->json([
              'status' => false,
              'message' => 'UnAuthorised Request'
            ],401);
        }

    }

    public function profile(Request $request){
        if(auth()->user()){
            return auth()->user();
        }else{
            return response()->json([
              'status' => false,
              'message' => 'UnAuthorised Request'
            ],401);
        }
    }
}
