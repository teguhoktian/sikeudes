<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if ($this->route()->user) {
            $email_rules = 'required|email|unique:users,email,' . $this->route()->user->id;
            $password_rules = 'nullable|confirmed';
        } else {
            $email_rules = 'required|email|unique:users,email';
            $password_rules = 'required|confirmed';
        }

        return [
            'name' => 'required:max:100',
            'email' => $email_rules,
            'password' => $password_rules,
            'id_desa' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('Nama'),
            'email' =>  __('Email'),
            'password' =>  __('Passsword'),
            'password_confirmation' =>  __('Konfirmasi Passsword'),
            'id_desa' => __('Desa')
        ];
    }
}
