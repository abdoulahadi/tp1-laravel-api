<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; 

class Etudiant extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'prenom','ine','code_etudiant', 'date_de_naissance', 'adresse', 'email'];

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }

    public static function generateUniqueCode($promo) {
        $code = 'P' . $promo . ' ' . rand(10000, 99999);

        while (Etudiant::where('code_etudiant', $code)->exists()) {
            $code = 'P' . $promo . ' ' . rand(10000, 99999);
        }    

        return $code;
    }
}
