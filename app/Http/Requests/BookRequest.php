<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check()) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:books|max:255',
            'author' => 'required',
            'publisher' => 'required',
            'publish_date' => 'required|date',
            'language' => 'required|string',
            'price' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'title.unique' => 'The book title has already been taken!'
        ];
    }
}
