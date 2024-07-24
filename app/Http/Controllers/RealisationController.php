<?php
namespace App\Http\Controllers;

use App\Models\Realisation;
use Illuminate\Http\Request;

class RealisationController extends Controller
{
    public function index()
    {
        $realisations = Realisation::all();
        return response()->json($realisations);
    }

    public function store(Request $request)
    {
        $realisation = Realisation::create($request->all());
        return response()->json($realisation);
    }

    public function show($id)
    {
        $realisation = Realisation::find($id);
        return response()->json($realisation);
    }

    public function update(Request $request, $id)
    {
        $realisation = Realisation::find($id);
        $realisation->update($request->all());
        return response()->json($realisation);
    }

    public function destroy($id)
    {
        Realisation::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
