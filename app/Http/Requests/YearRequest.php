<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class YearRequest extends FormRequest
{
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'year' => 'required'
        ];
    }

    
        /**
     * custome messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'year.required' => 'Nama Tahun Ajaran tidak boleh kosong !',
        ];
    }
}
