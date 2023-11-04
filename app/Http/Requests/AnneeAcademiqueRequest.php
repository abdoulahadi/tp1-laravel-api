<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AnneeAcademiqueRequest extends FormRequest
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
            'annee_academique' => 'required|regex:/^\d{4}-\d{4}$/'
        ];
    }
    public function messages()
{
    return [
        'annee_academique.regex' => 'Le format de l\'année académique doit être de la forme "XXXX-YYYY".',
    ];
}
}
