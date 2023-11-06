<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtudiantRequest;
use App\Http\Resources\EtudiantResource;
use App\Models\Etudiant;
use App\Models\Inscription;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $etudiants = Etudiant::all();
    

    return EtudiantResource::collection($etudiants);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(EtudiantRequest $request)
{
    $data = $request->validated();

    $data['code_etudiant'] = Etudiant::generateUniqueCode($data['promo']);
    $data['email'] = Etudiant::generateUniqueProfessionalEmail($data['prenom'],$data['nom']);

    if ($request->hasFile('image')) {
        $image = $request->file('image');

        $imageName = $data['email'] . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('images'), $imageName);

        $data['image'] = 'images/' . $imageName;
    }

    $etudiant = new Etudiant;
    $etudiant->nom = $data['nom'];
    $etudiant->prenom = $data['prenom'];
    $etudiant->ine = $data['ine'];
    $etudiant->code_etudiant = $data['code_etudiant'];
    $etudiant->date_de_naissance = $data['date_de_naissance'];
    $etudiant->lieu_de_naissance = $data['lieu_de_naissance'];
    $etudiant->adresse = $data['adresse'];
    $etudiant->sexe = $data['sexe'];
    $etudiant->email = $data['email'];
    $etudiant->save();

    if ($etudiant) {
        
        $inscription = new Inscription;
        $inscription->etudiant_id = $etudiant->id;
        $inscription->formation_id = $request->input('formation_id');
        $inscription->niveau_id = $request->input('niveau_id');
        $inscription->annee_academique_id = $request->input('annee_academique_id');
        $inscription->save();

        return new EtudiantResource($etudiant); 
    } else {
        return response()->json(['message' => 'Impossible de créer l\'étudiant'], 400);
    }
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $etudiant = Etudiant::findOrFail($id);
            return $etudiant->inscription()->id;
        } catch (\Exception $e) {
            return response()->json(['error' => 'Étudiant non trouvé'], 404);
        }
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(EtudiantRequest $request, Etudiant $etudiant)
{
    $data = $request->validated();

    if ($etudiant) {
        $etudiant->update($data);
        return new EtudiantResource($etudiant);
    } else {
        return response()->json(['error' => 'Étudiant introuvable.'], 404);
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        if ($etudiant->delete()) {
            return response()->json(['message' => 'Étudiant supprimé avec succès']);
        } else {
            return response()->json(['message' => 'L\'étudiant n\'existe pas'], 404);
        }
    }
    
}
