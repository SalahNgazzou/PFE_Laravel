<?php

namespace App\Http\Controllers\BiensConttroler;

use App\Http\Controllers\Controller;
use App\Models\Duplex;
use App\Models\Images_duplex;
use Illuminate\Http\Request;

class DuplexController extends Controller
{
    function ajouterDuplex(Request $request){
    $typeProduit = $request->type_produit;
   if($typeProduit == "Duplex"){
    $duplex = new Duplex();
    $duplex->discription = $request->input('discription');
    $duplex->disponibilté = $request->input('disponibilté');
    $duplex->categorie = $request->input('categorie');
    $duplex->annonce = $request->input('annonce');
    $duplex->etat = $request->input('etat');
    $duplex->addresse = $request->input('addresse');
    $duplex->ville = $request->input('ville');
    $duplex->couvernant = $request->input('couvernant');
    $duplex->prix = $request->input('prix');
    $duplex->surface = $request->input('surface');
    $duplex->nbr_chombre = $request->input('nbr_chombre');
    $duplex->nbr_salle_de_bain = $request->input('nbr_salle_de_bain');
    $duplex->meublé = $request->input('meublé');
    $duplex->vue = $request->input('vue');
    $duplex->terrase = $request->input('terrase');
    $duplex->balcon = $request->input('balcon');
    $duplex->etage = $request->input('etage');
    $duplex->ascenceur = $request->input('ascenceur');
    $duplex->parking = $request->input('parking');
    $duplex->proximité = $request->input('proximité');
    $duplex->chauffage = $request->input('chauffage');
    $duplex->climatisation = $request->input('climatisation');
    $duplex->id_user = $request->input('id_user');
    $duplex->user_name = $request->input('user_name');
    $duplex->user_lastName = $request->input('user_lastName');
    $duplex->user_email = $request->input('user_email');
    $duplex->user_phone = $request->input('user_phone');
    $duplex->propritair_name = $request->input('propritair_name');
    $duplex->proritaire_phone = $request->input('proritaire_phone');
    $duplex->save();
    $duplexID = $duplex->id;
    $imagesdata = [];
    // Enregistrer les images de la villa
    if ($files = $request->file('images')) {
        foreach ($files as $key => $file) {
            // Store each image in the storage directory
            $extension = $file->getClientOriginalExtension();
            $filename = $key . '_' . time() . '.' . $extension;
            $path = "uploads/Biens/";
            $file->move($path, $filename);
            $imagesdata[] = [
                'id_bien' => $duplexID,
                'src' => $path . $filename,
            ];

        }

    }
    Images_duplex::insert($imagesdata);
    }
    }
    public function modifierAppartement(Request $request, $id)
    {
        $appenement = Duplex::table('users')->where('status', 'active')->get();


        if (!$appenement) {
            return response()->json(['message' => 'Utilisateur non trouvé.'], 404);
        }
       
    }

}