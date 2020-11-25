<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class MahasiswaRequest extends FormRequest
{
    private $validatedJenisKelamin;

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
        $this->validatedJenisKelamin = ['laki-laki', 'perempuan', 'lainnya'];

        return [
            'nimMahasiswa' => 'sometimes|numeric|unique:mahasiswa,nim',
            'namaMahasiswa' => 'required|string',
            'jenisKelaminMahasiswa' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!in_array($value, $this->validatedJenisKelamin)) {
                        $fail('Bagian Jenis Kelamin Mahasiswa tidak sesuai');
                    }
                },
            ],
            'usiaMahasiswa' => 'required|integer|gte:18',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'nimMahasiswa' => 'NIM mahasiswa',
            'namaMahasiswa' => 'Nama mahasiswa',
            'jenisKelaminMahasiswa' => 'Jenis Kelamin mahasiswa',
            'usiaMahasiswa' => 'Usia mahasiswa',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Bagian :attribute harus diisi',
            'unique' => 'Data pada bagian :attribute sudah pernah ada',
            'numeric' => 'Bagian :attribute harus berupa angka',
            'integer' => 'Bagian :attribute harus berupa angka',
            'string' => 'Bagian :attribute harus berupa huruf',
            'gte' => 'Bagian :attribute harus lebih besar dari 18',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->slug),
        ]);
    }
}
