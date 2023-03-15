<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationFormRequest extends FormRequest
{
    protected $redirect = '/edit_form';
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'country' => 'required',

            'file' => 'required|mimes:png,jpg,jpeg|max:2048',
            'date' => 'required|date|after:yesterday'
        ];
    }
}
