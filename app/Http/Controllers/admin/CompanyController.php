<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

//All Models
use App\models\Company;

class CompanyController extends Controller
{

    public function editCompany()
    {
        return Company::where(['status' => '1'])->get()->first();
    }


    public function saveCompany(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($request->all(),[
            'company_owner' => 'required',
            'company_name' => 'required',
            'company_phone' => 'required',
            'company_city' => 'required',
            'company_state' => 'required',
            'company_zip' => 'required',
            'company_country' => 'required',
            'company_email' => 'required|email'
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
                request()->image->move(public_path('uploads/other'), $imageName);
                $data['company_logo'] = 'uploads/other/'.$imageName;
            }

            $fullAddress = $data['company_city'].' ,'.$data['company_state'].' '.$data['company_zip'].' '.$data['company_country'];
            $data['company_full_address'] = $fullAddress;

           // echo '<pre>';print_r($data['company_id']);die;
           $result = null;
           if( isset($data['company_id']) && ( $data['company_id'] > 0) ){
                $company = Company::find($data['company_id']);
                unset($data['company_id']);
                if($company){
                    $result = $company->update($data);
                }else{
                    $result = Company::create($data);
                }
           }else{
               unset($data['company_id']);
               $result = Company::create($data);
           }


            if($result){
                return response()->json([
                    'status' => true,
                    'message'=>'company detail updated successfully'
                ]);
            }
        }
    }


}
