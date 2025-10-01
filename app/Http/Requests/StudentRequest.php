<?php

namespace App\Http\Requests;

class StudentRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'nisn' => 'required',
            'class' => 'required',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */

    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'nisn.required' => 'Nisn tidak boleh kosong',
            'class.required' => 'Kelas tidak boleh kosong',

        ];
    }
}