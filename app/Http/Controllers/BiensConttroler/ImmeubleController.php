<?php

namespace App\Http\Controllers\BiensConttroler;

use App\Http\Controllers\Controller;
use App\Models\Images_immeuble;
use App\Models\Immeuble;
use Illuminate\Http\Request;

class ImmeubleController extends Controller
{
function ajouterTerrain(Request $request){
    $typeProduit = $request->type_produit;
    if($typeProduit == "Immeuble"){
        $immeuble = new Immeuble();
        $immeuble->discription = $request->input('discription');
        $immeuble->disponibilté = $request->input('disponibilté');
        $immeuble->categorie = $request->input('categorie');
        $immeuble->annonce = $request->input('annonce');
        $immeuble->etat = $request->input('etat');
        $immeuble->addresse = $request->input('addresse');
        $immeuble->ville = $request->input('ville');
        $immeuble->couvernant = $request->input('couvernant');
        $immeuble->prix = $request->input('prix');
        $immeuble->nbr_appartement = $request->input('nbr_appartement');
        $immeuble->nbr_etage = $request->input('nbr_etage');
        $immeuble->année_construction = $request->input('année_construction');
        $immeuble->superficie_total = $request->input('superficie_total');
        $immeuble->superficie_appartement = $request->input('superficie_appartement');
        $immeuble->type_immeuble = $request->input('type_immeuble');
        $immeuble->espace_commun = $request->input('espace_commun');
        $immeuble->id_user = $request->input('id_user');
        $immeuble->user_name = $request->input('user_name');
        $immeuble->user_lastName = $request->input('user_lastName');
        $immeuble->user_email = $request->input('user_email');
        $immeuble->user_phone = $request->input('user_phone');
        $immeuble->propritair_name = $request->input('propritair_name');
        $immeuble->proritaire_phone = $request->input('proritaire_phone');
        $immeuble->save();
        $immeubleID = $immeuble->id;
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
                    'id_bien' => $immeubleID,
                    'src' => $path . $filename,
                ];

            }

        }
        Images_immeuble::insert($imagesdata);
    }}}