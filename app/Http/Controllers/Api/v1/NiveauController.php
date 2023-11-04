<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\NiveauRequest;
use App\Http\Resources\NiveauResource;
use App\Models\Niveau;
use Illuminate\Http\Request;

class NiveauController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $niveaux = Niveau::all();
        return NiveauResource::collection($niveaux);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NiveauRequest $request)
{
    $niveau = Niveau::create($request->all());

    if ($niveau) {
        return new NiveauResource($niveau);
    } else {
        return response()->json(['message' => 'Le niveau n\'a pas pu être créé.'], 500);
    }
}


    /**
     * Display the specified resource.
     */
    public function show(Niveau $niveau)
    {
        try {
            $niveau = Niveau::findOrFail($niveau->id);
            return new NiveauResource($niveau);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Le niveau n\'existe pas.'], 404);
        }
    }
    
    
    /**
     * Update the specified resource in storage.
     */
    public function update(NiveauRequest $request, Niveau $niveau)
{
    if (!$niveau) {
        return response()->json(['error' => 'Le niveau n\'existe pas.'], 404);
    }

    $niveau->update($request->all());

    return new NiveauResource($niveau);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Niveau $niveau)
{
    if ($niveau) {
        $niveau->delete();
        return response()->json(['message' => 'Niveau supprimé avec succès'], 200);
    } else {
        return response()->json(['error' => 'Le niveau n\'existe pas'], 404);
    }
}

}
