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
    function updateRechercheStatusToTerminated($id) {
        $recherche = Recherches::find($id);
    
        if ($recherche) {
            $recherche->etat = 'terminé';
            $recherche->save();
            return true; // Si la mise à jour est réussie
        }
    
        return false; // Si l'recherche avec l'ID donné n'est pas trouvée
    }
    function deleteRechercheById($id) {
        $recherche = Recherches::find($id);
    
        if ($recherche) {
            $recherche->delete();
            return true; // Si la suppression est réussie
        }
    
        return false; // Si l'estimation avec l'ID donné n'est pas trouvée
    }
}
