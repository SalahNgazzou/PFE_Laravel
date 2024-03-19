<?php

namespace App\Http\Controllers\BiensConttroler;

use App\Http\Controllers\Controller;
use App\Models\Images_local_commercial;
use App\Models\Local_commercial;
use Illuminate\Http\Request;

class Local_commercialController extends Controller
{
function ajouterLocalCommercial(Request $request){
    $typeProduit = $request->type_produit;
    if($typeProduit == "Immeuble"){
        $local_commercial = new Local_commercial();
        $local_commercial->discription = $request->input('discription');
        $local_commercial->disponibilté = $request->input('disponibilté');
        $local_commercial->categorie = $request->input('categorie');
        $local_commercial->annonce = $request->input('annonce');
        $local_commercial->etat = $request->input('etat');
        $local_commercial->addresse = $request->input('addresse');
        $local_commercial->ville = $request->input('ville');
        $local_commercial->couvernant = $request->input('couvernant');
        $local_commercial->prix = $request->input('prix');
        $local_commercial->superficie = $request->input('superficie');
        $local_commercial->type_commerce_autorisé = $request->input('type_commerce_autorisé');
        $local_commercial->equipement = $request->input('equipement');
        $local_commercial->visibilité = $request->input('visibilité');
        $local_commercial->parking = $request->input('parking');
        $local_commercial->id_user = $request->input('id_user');
        $local_commercial->user_name = $request->input('user_name');
        $local_commercial->user_lastName = $request->input('user_lastName');
        $local_commercial->user_email = $request->input('user_email');
        $local_commercial->user_phone = $request->input('user_phone');
        $local_commercial->propritair_name = $request->input('propritair_name');
        $local_commercial->proritaire_phone = $request->input('proritaire_phone');
        $local_commercial->save();
        $local_commercialID = $local_commercial->id;
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
                    'id_bien' => $local_commercialID,
                    'src' => $path . $filename,
                ];

            }

        }
        Images_local_commercial::insert($imagesdata);
    }}}