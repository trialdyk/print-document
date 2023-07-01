<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassroomRequest extends FormRequest
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
        $request = [
            'name' => 'required|string',
            'year_id' => 'required'
        ];
        return $request;
    }

        /**
     * custome messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong !',
            'name.string' => 'Nama harus berupa string !',
            'year_id.required' => 'Tahun Ajaran Harus Diisi !'
        ];
    }
}
