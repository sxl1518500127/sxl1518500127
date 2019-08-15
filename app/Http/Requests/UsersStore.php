<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customername' => 'required|regex:/^[a-zA-Z]{1}[\w]{7,15}$/|unique:usercustomer',
            'customerpass' => 'required|regex:/^[\w]{6,18}$/',
            'repass' => 'required|same:customerpass',
            'customeremail' => 'required|email',
            'customerphone' => 'required|regex:/^1{1}[3-9]{1}[\d]{9}$/',
        ];
    }


    public function messages()
    {
        return [
            'customername.required'=>'用户名必填',    
            'customername.regex'=>'用户名格式错误',    
            'customername.unique'=>'用户名已存在',    
            'customerpass.required'=>'密码必填',    
            'customerpass.regex'=>'密码格式错误',    
            'repass.required'=>'确认密码必填',    
            'repass.same'=>'俩次密码不一致',    
            'customeremail.required'=>'邮箱必填',    
            'customeremail.email'=>'邮箱格式错误',    
            'customerphone.required'=>'手机号必填',    
            'customerphone.regex'=>'手机号格式错误',    
        ];
    }
}
