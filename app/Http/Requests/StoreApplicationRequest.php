<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'career_id' => 'required|exists:careers,id',
            'domicile' => 'required|string',
            'description' => 'required|string',
            'resume' => 'required|file|mimes:pdf',
            'self_picture' => 'required|file|image',
            'competence_certificate' => 'required|file|mimes:pdf',
            'identity_card' => 'required|file|mimes:pdf',
        ];
    }
}
