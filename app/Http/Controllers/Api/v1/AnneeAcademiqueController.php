<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnneeAcademiqueRequest;
use App\Http\Resources\AnneeAcademiqueResource;
use App\Models\AnneeAcademique;
use Illuminate\Http\Request;

class AnneeAcademiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anneesAcademiques = AnneeAcademique::all();
        return AnneeAcademiqueResource::collection($anneesAcademiques);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(AnneeAcademiqueRequest $request)
    {
        $validatedData = $request->validated();
        $anneeAcademiqueInput = $validatedData['annee_academique'];

        $startYear = intval(substr($anneeAcademiqueInput, 0, 4));
        $endYear = intval(substr($anneeAcademiqueInput, 5, 4));
        $nextYear = $startYear + 1;


        if ($endYear !== $nextYear) {
            return response()->json(['error' => 'Les années académiques ne sont pas successives.'], 400);
        }
    
        try {
            $anneeAcademique = new AnneeAcademique;
            $anneeAcademique->annee_academique = $anneeAcademiqueInput;
            $anneeAcademique->save();
    
            return new AnneeAcademiqueResource($anneeAcademique);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Impossible de créer l\'année académique'], 500);
        }
    }
    



    /**
     * Display the specified resource.
     */
    public function show(AnneeAcademique $anneeAcademique)
{
    try {
        $anneeAcademique = AnneeAcademique::findOrFail($anneeAcademique->id);
        return new AnneeAcademiqueResource($anneeAcademique);
    } catch (\Exception $e) {
        return response()->json(['error' => 'L\'année académique n\'existe pas.'], 404);
    }
}
    /**
     * Update the specified resource in storage.
     */
    public function update(AnneeAcademiqueRequest $request, $id)
{
    try {
        // Recherchez l'année académique par son identifiant
        $anneeAcademique = AnneeAcademique::findOrFail($id);

        // Mettez à jour l'année académique
        $anneeAcademique->annee_academique = $request->input('annee_academique');
        $anneeAcademique->save();

        return new AnneeAcademiqueResource($anneeAcademique);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Année académique non trouvée.'], 404);
    }
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnneeAcademique $anneeAcademique)
    {
        if ($anneeAcademique) {
            $anneeAcademique->delete();
            return response()->json(['message' => 'L\'année académique a été supprimée']);
        } else {
            return response()->json(['message' => 'L\'année académique n\'existe pas'], 404);
        }
    }
    
}
