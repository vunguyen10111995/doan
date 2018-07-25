<?php

namespace App\Http\Requests\sites;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'full_name' => 'required|max:100',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:20',
            'full_name_guest' => 'required|max:100',
            'address' => 'required|max:191',
        ];
    }
}
