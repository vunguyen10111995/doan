<?php

namespace App\Http\Requests\sites;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'password' => 'min:6|required',
            'password_register' => 'min:6|required',
            'password_confirm' => 'same:password_register|min:6|required',
        ];
    }
}
