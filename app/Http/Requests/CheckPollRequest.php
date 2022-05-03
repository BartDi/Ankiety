<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CheckPollRequest extends FormRequest
{
    protected $redirectRoute = "create";
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
            'title' => 'required|min:3|max:255',
            'options' => 'required|array|min:2',
            'options.*' => 'required',
            'time' => 'nullable|numeric',
            'result' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Musisz zadać pytanie',
            'title.min' => 'Pytanie musi zawierać conajmniej 3 znaki',
            'title.max' => 'Pytanie nie może zawierać więcej niż 255 znaków',
            'options.array' => 'Ankieta musi zawierać więcej opcji',
            'options.min' => 'Musisz dodać conajmniej 2 opcje',
            'options.required' => 'Ankieta musi posiadać jakieś opcje',
            'options.*.*' => 'Opcje nie mogą być puste',
            'time.numeric' => 'Czas musi być podany w liczbach'
        ];
    }
}
