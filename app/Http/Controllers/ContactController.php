<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return Inertia::render('Admin/Contacts/Index', ['contacts' => $contacts]);
    }

    public function create()
    {
        return Inertia::render('Admin/Contacts/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|unique:contacts,text',
            'horaire' => 'required',
            'localisation' => 'required',
            // 'adresse' n'est plus obligatoire car nullable
        ]);

        Contact::create($request->all());
        return redirect()->route('contacts.index');
    }

    public function show(Contact $contact)
    {
        return Inertia::render('Admin/Contacts/Show', ['contact' => $contact]);
    }

    public function edit(Contact $contact)
    {
        return Inertia::render('Admin/Contacts/Edit', ['contact' => $contact]);
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'text' => 'required|unique:contacts,text,' . $contact->id,
            'horaire' => 'required',
            'localisation' => 'required',
            // 'adresse' n'est plus obligatoire car nullable
        ]);

        $contact->update($request->all());
        return redirect()->route('contacts.index');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index');
    }
}
