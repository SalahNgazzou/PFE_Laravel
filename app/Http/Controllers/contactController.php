<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;

class contactController extends Controller
{
    function getContactEnAttente() {
        return Contacts::where('etat', 'en attente')->get();
    }
    function getDemandeContactsById($id) {
        return Contacts::find($id);
    }
    function deleteContactById($id) {
        $contact = Contacts::find($id);
    
        if ($contact) {
            $contact->delete();
            return true; // Si la suppression est réussie
        }
    
        return false; // Si l'estimation avec l'ID donné n'est pas trouvée
    }
}
