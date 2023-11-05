<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EtudiantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'ine' => $this->ine,
            'codeEtudiant' => $this->code_etudiant,
            'dateDeNaissance' => $this->date_de_naissance,
            'lieuDeNaissance' => $this->lieu_de_naissance,
            'adresse' => $this->adresse,
            'email' => $this->email,
            'sexe' => $this->sexe,
            'createdAt' => $this->created_at->format('Y-m-d H:i:s'),
            'updatedAt' => $this->updated_at->format('Y-m-d H:i:s')
        ];
    }
}
