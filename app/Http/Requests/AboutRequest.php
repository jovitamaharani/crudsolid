<?php

namespace App\Http\Requests;

class AboutRequest extends BaseRequest
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
            'hobi' => 'required',
            'umur' => 'required',
            'umur' => 'numeric',
            'photo' => 'required|max:5000|mimes:jpg,png,jpeg'
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
            'hobi.required' => 'Hobi tidak boleh kosong',
            'umur.required' => 'Umur tidak boleh kosong',
            'umur.numeric' => 'Umur harus berupa angka',
            'photo.required' => 'foto tidak boleh kosong',
            'photo.max' => 'ukuran foto melebihi jumlah max',
            'photo.mimes' => 'foto harus berupa jpg,png,jpeg'
        ];
    }
}