<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;
    protected $fillable = ['etudiant_id', 'formation_id', 'niveau_id', 'annee_academique_id'];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'etudiant_id');
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class,'formation_id');
    }

    public function niveau()
    {
        return $this->belongsTo(Niveau::class,'niveau_id');
    }

    public function anneeAcademique()
    {
        return $this->belongsTo(AnneeAcademique::class,'annee_academique_id');
    }
}
