<?php

namespace App\Http\Controllers;

use App\Models\Recherches;
use Illuminate\Http\Request;

class rechercheController extends Controller
{
    function getDemandesRecherche() {
        return Recherches::where('etat', 'en attente')->get();
    }
    function getDemandeRechercheById($id) {
        return Recherches::find($id);
    }
}
