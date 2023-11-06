<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\InscriptionRequest;
use App\Http\Resources\InscriptionResource;
use App\Models\Etudiant;
use App\Models\Inscription;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inscriptions = Inscription::with(['etudiant', 'formation', 'niveau', 'anneeAcademique'])->get();
    return InscriptionResource::collection($inscriptions);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(InscriptionRequest $request)
{
    $inscription = Inscription::create($request->validated());

    if ($inscription) {
        return new InscriptionResource($inscription);
    } else {
        return response()->json(['error' => 'Impossible de créer l\'inscription'], 500);
    }
}


    /**
     * Display the specified resource.
     */
    public function show(Inscription $inscription)
    {
        try {
            $inscription = Inscription::findOrFail($inscription->id);
            return new InscriptionResource($inscription);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'L\'inscription n\'existe pas.'], 404);
        }
    }
    


    /**
     * Update the specified resource in storage.
     */
    public function update(InscriptionRequest $request, Inscription $inscription)
{
    try {
        $data = $request->validated();
        $value = Inscription::findOrFail($data['inscription_id']);
        $inscription->etudiant_id = $value->etudiant_id;
        $inscription->formation_id = $data['formation_id'];
        $inscription->niveau_id = $data['niveau_id'];
        $inscription->annee_academique_id = $data['annee_academique_id'];
        $inscription->update();

        $etudiant = Etudiant::findOrfail($inscription->etudiant_id);
        $etudiant->nom = $data['nom'];
        $etudiant->prenom = $data['prenom'];
        $etudiant->ine = $data['ine'];
        $etudiant->date_de_naissance = $data['date_de_naissance'];
        $etudiant->lieu_de_naissance = $data['lieu_de_naissance'];
        $etudiant->adresse = $data['adresse'];
        $etudiant->sexe = $data['sexe'] ?? "";
        $etudiant->update();

        return new InscriptionResource($inscription);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Inscription introuvable. '.$e], 404);
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inscription $inscription)
{
    if ($inscription) {
        $idEtudiant =  $inscription->etudiant->id;
        $inscription->delete();
        $etudiant = Etudiant::findOrfail($idEtudiant);
        $etudiant->delete();
        return response()->json(['message' => 'l\'inscription supprimée avec succès'], 200);
    } else {
        return response()->json(['message' => 'L\'inscription n\'existe pas.'], 404);
    }
}
    
}
