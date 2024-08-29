<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PasswordRule;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'login' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'string', 'confirmed', new PasswordRule()],
            'role' => 'required|string',
        ];
    }
}
