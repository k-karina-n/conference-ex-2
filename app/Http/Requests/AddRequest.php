<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
{
    protected $redirect = '/add_speaker';
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

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

            'title' => 'required',
            'description' => 'required|max:1000',
            'date' => 'required|after_or_equal:today'
        ];
    }
}
