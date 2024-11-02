<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SheepRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'sheep_name' => 'required',
            'sheep_birth' => 'required|date',
            'sheep_gender' => 'required',
        ];
    }

    public function messages(): array {
        return [
            'sheep_name.required' => 'Nama domba harus diisi.',
            'sheep_birth.required' => 'Tanggal lahir harus diisi.',
            'sheep_birth.date' => 'Format tanggal tidak valid.',
            'sheep_gender.required' => 'Jenis kelamin harus dipilih.',
        ];
    }
}
