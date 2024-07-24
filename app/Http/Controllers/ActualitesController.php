<?php

namespace App\Http\Controllers;

use App\Models\Actualites;
use Illuminate\Http\Request;

class ActualitesController extends Controller
{
    public function index()
    {
        $actualites = Actualites::all();
        return response()->json($actualites);
    }

    public function store(Request $request)
    {
        $actualite = Actualites::create($request->all());
        return response()->json($actualite);
    }

    public function show($id)
    {
        $actualite = Actualites::find($id);
        return response()->json($actualite);
    }

    public function update(Request $request, $id)
    {
        $actualite = Actualites::find($id);
        $actualite->update($request->all());
        return response()->json($actualite);
    }

    public function destroy($id)
    {
        Actualites::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
