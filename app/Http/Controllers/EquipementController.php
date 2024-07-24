<?php

namespace App\Http\Controllers;

use App\Models\Equipement;
use Illuminate\Http\Request;

class EquipementController extends Controller
{
    public function index()
    {
        $equipements = Equipement::all();
        return response()->json($equipements);
    }

    public function store(Request $request)
    {
        $equipement = Equipement::create($request->all());
        return response()->json($equipement);
    }

    public function show($id)
    {
        $equipement = Equipement::find($id);
        return response()->json($equipement);
    }

    public function update(Request $request, $id)
    {
        $equipement = Equipement::find($id);
        $equipement->update($request->all());
        return response()->json($equipement);
    }

    public function destroy($id)
    {
        Equipement::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
