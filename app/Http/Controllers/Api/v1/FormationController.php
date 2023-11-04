<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormationRequest;
use App\Http\Resources\FormationResource;
use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $formations = Formation::all();
    return FormationResource::collection($formations);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormationRequest $request)
{
    $formation = Formation::create($request->validated());

    if ($formation) {
        return new FormationResource($formation);
    } else {
        return response()->json(['message' => 'La formation n\'a pas pu être créée.'], 400);
    }
}


    /**
     * Display the specified resource.
     */
    public function show(Formation $formation)
    {
        try {
            $formation = Formation::findOrFail($formation->id);
            return new FormationResource($formation);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Formation non trouvée'], 404);
        }
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(FormationRequest $request, Formation $formation)
{
    try {
        $updatedFormation = $formation->findOrFail($formation->id);
        $updatedFormation->update($request->validated());
        return new FormationResource($updatedFormation);
    } catch (\Exception $e) {
        return response()->json(['error' => 'La formation n\'existe pas.'], 404);
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formation $formation)
{
    if ($formation->delete()) {
        return response()->json(['message' => 'Formation supprimée avec succès'], 200);
    } else {
        return response()->json(['error' => 'Formation introuvable'], 404);
    }
}

}
