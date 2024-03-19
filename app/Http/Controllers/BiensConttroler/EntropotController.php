<?php

namespace App\Http\Controllers\BiensConttroler;

use App\Http\Controllers\Controller;

use App\Models\Entropot;
use App\Models\Images_entropot;
use Illuminate\Http\Request;

class EntropotController extends Controller
{
function ajouterEntropot(Request $request){
    $typeProduit = $request->type_produit;
    if($typeProduit == "Terrain"){
        $entropot = new Entropot();
        $entropot->discription = $request->input('discription');
        $entropot->disponibilté = $request->input('disponibilté');
        $entropot->categorie = $request->input('categorie');
        $entropot->annonce = $request->input('annonce');
        $entropot->etat = $request->input('etat');
        $entropot->addresse = $request->input('addresse');
        $entropot->ville = $request->input('ville');
        $entropot->couvernant = $request->input('couvernant');
        $entropot->prix = $request->input('prix');
        $entropot->superficie = $request->input('superficie');
        $entropot->capacité_stockage = $request->input('capacité_stockage');
        $entropot->heuteur = $request->input('heuteur');
        $entropot->condition_stockage = $request->input('condition_stockage');
        $entropot->equipement = $request->input('equipement');
        $entropot->securité = $request->input('securité');
        $entropot->id_user = $request->input('id_user');
        $entropot->user_name = $request->input('user_name');
        $entropot->user_lastName = $request->input('user_lastName');
        $entropot->user_email = $request->input('user_email');
        $entropot->user_phone = $request->input('user_phone');
        $entropot->propritair_name = $request->input('propritair_name');
        $entropot->proritaire_phone = $request->input('proritaire_phone');
        $entropot->save();
        $entropotID = $entropot->id;
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
                    'id_bien' => $entropotID,
                    'src' => $path . $filename,
                ];

            }

        }
        Images_entropot::insert($imagesdata);
    }}}