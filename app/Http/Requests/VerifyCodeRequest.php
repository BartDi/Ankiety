<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyCodeRequest extends FormRequest
{

    protected $redirectRoute = "enter";
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'code' => 'required|min:4|max:4'
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Wpisz kod',
            'code.min' => 'Kod musi zawierać 4 znaki',
            'code.max' => 'Kod musi zawierać 4 znaki'
        ];
    }
}
