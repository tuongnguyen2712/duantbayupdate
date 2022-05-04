<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckLogin extends FormRequest
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
    public function rules() {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function messages() {
        return [
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Tài khoản không đúng',
            'password.required' => 'Bạn chưa nhập mật khẩu',
        ];
    }

    public function attributes(){
        return [
            'Email' => 'Email',
            'password' => 'Mật khẩu'
        ];
    }
}
