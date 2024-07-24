<?php

namespace App\Http\Controllers;

use App\Models\ElectronicRobotique;
use Illuminate\Http\Request;

class ElectronicRobotiqueController extends Controller
{
    public function index()
    {
        $electronicRobotiques = ElectronicRobotique::all();
        return response()->json($electronicRobotiques);
    }

    public function store(Request $request)
    {
        $electronicRobotique = ElectronicRobotique::create($request->all());
        return response()->json($electronicRobotique);
    }

    public function show($id)
    {
        $electronicRobotique = ElectronicRobotique::find($id);
        return response()->json($electronicRobotique);
    }

    public function update(Request $request, $id)
    {
        $electronicRobotique = ElectronicRobotique::find($id);
        $electronicRobotique->update($request->all());
        return response()->json($electronicRobotique);
    }

    public function destroy($id)
    {
        ElectronicRobotique::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
