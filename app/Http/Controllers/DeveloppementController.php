<?php

namespace App\Http\Controllers;

use App\Models\Developpement;
use Illuminate\Http\Request;

class DeveloppementController extends Controller
{
    public function index()
    {
        $developpements = Developpement::all();
        return response()->json($developpements);
    }

    public function store(Request $request)
    {
        $developpement = Developpement::create($request->all());
        return response()->json($developpement);
    }

    public function show($id)
    {
        $developpement = Developpement::find($id);
        return response()->json($developpement);
    }

    public function update(Request $request, $id)
    {
        $developpement = Developpement::find($id);
        $developpement->update($request->all());
        return response()->json($developpement);
    }

    public function destroy($id)
    {
        Developpement::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
