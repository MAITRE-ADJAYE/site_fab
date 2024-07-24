<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EvenementController extends Controller
{
    public function index()
    {
        $evenements = Evenement::all();
        return Inertia::render('Admin/Evenements/Index', [
            'evenements' => $evenements,
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Evenements/Create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validatedData['image'] = $request->file('photo')->store('images');
        }

        Evenement::create($validatedData);

        return redirect()->route('evenements.index');
    }

    public function show($id)
    {
        $evenement = Evenement::findOrFail($id);
        return Inertia::render('Admin/Evenements/Show', [
            'evenement' => $evenement,
        ]);
    }

    public function edit($id)
    {
        $evenement = Evenement::findOrFail($id);
        return Inertia::render('Admin/Evenements/Edit', [
            'evenement' => $evenement,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $evenement = Evenement::findOrFail($id);

        if ($request->hasFile('photo')) {
            $validatedData['image'] = $request->file('photo')->store('images');
        }

        $evenement->update($validatedData);

        return redirect()->route('evenements.index');
    }

    public function destroy($id)
    {
        Evenement::destroy($id);
        return redirect()->route('evenements.index');
    }
}
