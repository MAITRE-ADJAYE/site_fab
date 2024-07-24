<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        $alumnis = Alumni::all();
        return response()->json($alumnis);
    }

    public function store(Request $request)
    {
        $alumni = Alumni::create($request->all());
        return response()->json($alumni);
    }

    public function show($id)
    {
        $alumni = Alumni::find($id);
        return response()->json($alumni);
    }

    public function update(Request $request, $id)
    {
        $alumni = Alumni::find($id);
        $alumni->update($request->all());
        return response()->json($alumni);
    }

    public function destroy($id)
    {
        Alumni::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
