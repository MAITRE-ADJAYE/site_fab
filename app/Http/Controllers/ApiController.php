<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Realisation;
use App\Models\Benevola;
use App\Models\Alumni;
use App\Models\ElectroniqueRobotique;
use App\Models\ReferenceDigital;
use App\Models\Equipement;
use App\Models\Developpement;
use App\Models\Contact;
use App\Models\ReseauxSociaux;
use App\Models\Actualite;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function register(Request $request)
    {
        // Registration logic here
    }

    public function login(Request $request)
    {
        // Login logic here
    }

    public function evenements()
    {
        return Evenement::all();
    }

    public function realisations()
    {
        return Realisation::all();
    }

    public function benevolas()
    {
        return Benevola::all();
    }

    public function alumnis()
    {
        return Alumni::all();
    }

    public function electronicrobotique()
    {
        return ElectroniqueRobotique::all();
    }

    public function referencedigital()
    {
        return ReferenceDigital::all();
    }

    public function equipements()
    {
        return Equipement::all();
    }

    public function developpements()
    {
        return Developpement::all();
    }

    public function contacts()
    {
        return Contact::all();
    }

    public function reseauxsociaux()
    {
        return ReseauxSociaux::all();
    }

    public function actualites()
    {
        return Actualite::all();
    }
}

