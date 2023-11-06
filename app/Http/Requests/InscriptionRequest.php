<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InscriptionRequest extends FormRequest
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
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'ine' => 'required|string|max:255',
            'formation_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'inscription_id' => 'required',
            'niveau_id' => 'required',
            'annee_academique_id' => 'required',
            'date_de_naissance' => 'required|date|before_or_equal:'.now()->subYears(15)->format('Y-m-d'),
            'lieu_de_naissance' => 'required|string',
            'adresse' => 'required|string|max:255',
            'sexe' => 'string'
        ];
    }
}
