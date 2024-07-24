<?php

namespace App\Http\Controllers;

use App\Models\Benevola;
use Illuminate\Http\Request;

class BenevolaController extends Controller
{
    public function index()
    {
        $benevolas = Benevola::all();
        return response()->json($benevolas);
    }

    public function store(Request $request)
    {
        $benevola = Benevola::create($request->all());
        return response()->json($benevola);
    }

    public function show($id)
    {
        $benevola = Benevola::find($id);
        return response()->json($benevola);
    }

    public function update(Request $request, $id)
    {
        $benevola = Benevola::find($id);
        $benevola->update($request->all());
        return response()->json($benevola);
    }

    public function destroy($id)
    {
        Benevola::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
