<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InitialAssessmentRequest extends FormRequest {
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
            'sheep_id' => 'required|exists:sheep,id',
            'user_id' => 'required|exists:users,id',
            'symptom_1' => 'required|string|max:100',
            'symptom_2' => 'nullable|string|max:100',
            'symptom_3' => 'nullable|string|max:100',
            'check_date' => 'required|date',
            'desc' => 'nullable|string',
        ];
    }

    public function messages(): array {
        return [
            'sheep_id.required' => 'ID domba harus diisi.',
            'user_id.required' => 'ID pengguna harus diisi.',
            'user_id.exists' => 'Pengguna tidak ditemukan.',
            'symptom_1.required' => 'Gejala pertama harus diisi.',
            'check_date.required' => 'Tanggal pemeriksaan harus diisi.',
            'check_date.date' => 'Format tanggal tidak valid.',
        ];
    }
}
