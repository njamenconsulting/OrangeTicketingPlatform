<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\IsValidPassword;

class CreateUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','string','email','max:255','unique:users'],
            'phone' => ['bail','required','regex:/^(2|6)([0-9]{8})$/'],
            //'password' => ['required', 'min:6', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/', 'confirmed'],
            'password' => [
                'required',
                'confirmed',
                'string',
                new isValidPassword(),
            ],
          //'role_id.*' => ['required','string','distinct','min:1'],
        ];
    }
}
