<?php

namespace App\Http\Requests;

use App\Rules\TelephoneRule;
use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'nullable|exists:users,id',
            'surnom' => 'required|string|unique:clients,surnom,' . $this->client,
            'phone' => ['required', 'string', new TelephoneRule()],
            'adresse' => 'required|string',
        ];
    }
}