<?php

namespace App\Http\Controllers;

use App\Models\Estimations;
use Illuminate\Http\Request;

class EstimationController extends Controller
{
    function getDemandesEnAttente() {
        return Estimations::where('etat', 'en attente')->get();
    }
    function getDemandeEstimationById($id) {
        return Estimations::find($id);
    }
    function updateEstimationStatusToTerminated($id) {
        $estimation = Estimations::find($id);
    
        if ($estimation) {
            $estimation->etat = 'terminé';
            $estimation->save();
            return true; // Si la mise à jour est réussie
        }
    
        return false; // Si l'estimation avec l'ID donné n'est pas trouvée
    }
    function deleteEstimationById($id) {
        $estimation = Estimations::find($id);
    
        if ($estimation) {
            $estimation->delete();
            return true; // Si la suppression est réussie
        }
    
        return false; // Si l'estimation avec l'ID donné n'est pas trouvée
    }
}
