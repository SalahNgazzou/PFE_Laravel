<?php

namespace App\Http\Controllers\BiensConttroler;

use App\Http\Controllers\Controller;
use App\Models\Appartement;
use App\Models\Images_appartement;
use Illuminate\Http\Request;

class AppartementController extends Controller
{
    function ajouterAppartement(Request $request){
    $typeProduit = $request->type_produit;
   if($typeProduit == "Appartement"){
        $appartement = new Appartement();
        $appartement->discription = $request->input('discription');
        $appartement->disponibilté = $request->input('disponibilté');
        $appartement->categorie = $request->input('categorie');
        $appartement->annonce = $request->input('annonce');
        $appartement->etat = $request->input('etat');
        $appartement->addresse = $request->input('addresse');
        $appartement->ville = $request->input('ville');
        $appartement->couvernant = $request->input('couvernant');
        $appartement->prix = $request->input('prix');
        $appartement->surface = $request->input('surface');
        $appartement->nbr_chombre = $request->input('nbr_chombre');
        $appartement->nbr_salle_de_bain = $request->input('nbr_salle_de_bain');
        $appartement->meublé = $request->input('meublé');
        $appartement->balcon = $request->input('balcon');
        $appartement->etage = $request->input('etage');
        $appartement->ascenceur = $request->input('ascenceur');
        $appartement->parking = $request->input('parking');
        $appartement->proximité = $request->input('proximité');
        $appartement->chauffage = $request->input('chauffage');
        $appartement->climatisation = $request->input('climatisation');
        $appartement->id_user = $request->input('id_user');
        $appartement->user_name = $request->input('user_name');
        $appartement->user_lastName = $request->input('user_lastName');
        $appartement->user_email = $request->input('user_email');
        $appartement->user_phone = $request->input('user_phone');
        $appartement->propritair_name = $request->input('propritair_name');
        $appartement->proritaire_phone = $request->input('proritaire_phone');
        $appartement->save();
        $appartementID = $appartement->id;
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
                    'id_bien' => $appartementID,
                    'src' => $path . $filename,
                ];

            }

        }
        Images_appartement::insert($imagesdata);
    }
    }
    public function modifierAppartement(Request $request, $id)
    {
        $appenement = Appartement::table('users')->where('status', 'active')->get();


        if (!$appenement) {
            return response()->json(['message' => 'Utilisateur non trouvé.'], 404);
        }
       
    }

}
