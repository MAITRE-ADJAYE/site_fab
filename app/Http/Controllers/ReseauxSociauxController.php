<?php

namespace App\Http\Controllers;

use App\Models\ReseauxSociaux;
use Illuminate\Http\Request;

class ReseauxSociauxController extends Controller
{
    public function index()
    {
        $reseauxSociaux = ReseauxSociaux::all();
        return response()->json($reseauxSociaux);
    }

    public function store(Request $request)
    {
        $reseauxSociaux = ReseauxSociaux::create($request->all());
        return response()->json($reseauxSociaux);
    }

    public function show($id)
    {
        $reseauxSociaux = ReseauxSociaux::find($id);
        return response()->json($reseauxSociaux);
    }

    public function update(Request $request, $id)
    {
        $reseauxSociaux = ReseauxSociaux::find($id);
        $reseauxSociaux->update($request->all());
        return response()->json($reseauxSociaux);
    }

    public function destroy($id)
    {
        ReseauxSociaux::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
