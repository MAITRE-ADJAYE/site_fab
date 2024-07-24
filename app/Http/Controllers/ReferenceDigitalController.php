<?php

namespace App\Http\Controllers;

use App\Models\ReferenceDigital;
use Illuminate\Http\Request;

class ReferenceDigitalController extends Controller
{
    public function index()
    {
        $referencesDigitales = ReferenceDigital::all();
        return response()->json($referencesDigitales);
    }

    public function store(Request $request)
    {
        $referenceDigital = ReferenceDigital::create($request->all());
        return response()->json($referenceDigital);
    }

    public function show($id)
    {
        $referenceDigital = ReferenceDigital::find($id);
        return response()->json($referenceDigital);
    }

    public function update(Request $request, $id)
    {
        $referenceDigital = ReferenceDigital::find($id);
        $referenceDigital->update($request->all());
        return response()->json($referenceDigital);
    }

    public function destroy($id)
    {
        ReferenceDigital::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
