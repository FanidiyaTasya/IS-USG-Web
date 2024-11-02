<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RadiologyRequest extends FormRequest {
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
            'assessment_id' => 'required|exists:initial_assessments,id',
            'ultrasound_image' => 'required|string|max:255',
            'gestational_age' => 'nullable|integer|min:0',
            'est_birth' => 'nullable|date',
            'pregnancy_status' => 'required|in:Hamil,Tidak Hamil',
        ];
    }

    public function messages(): array {
        return [
            'assessment_id.required' => 'ID assessment harus diisi.',
            'assessment_id.exists' => 'Assessment tidak ditemukan.',
            'ultrasound_image.required' => 'Gambar ultrasound harus diisi.',
            'ultrasound_image.string' => 'Gambar ultrasound harus berupa string.',
            'ultrasound_image.max' => 'Gambar ultrasound tidak boleh lebih dari 255 karakter.',
            'gestational_age.integer' => 'Usia gestasi harus berupa angka bulat.',
            'pregnancy_status.required' => 'Status kehamilan harus dipilih.',
            'pregnancy_status.in' => 'Status kehamilan harus salah satu dari: Hamil, Tidak Hamil.',
        ];
    }
}
