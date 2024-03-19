<?php

namespace App\Http\Controllers\BiensConttroler;

use App\Http\Controllers\Controller;

use App\Models\Images_usine;
use App\Models\Usine;
use Illuminate\Http\Request;

class UsineController extends Controller
{
function ajouterUsine(Request $request){
    $typeProduit = $request->type_produit;
    if($typeProduit == "Usine"){
        $usine = new Usine();
        $usine->discription = $request->input('discription');
        $usine->disponibilté = $request->input('disponibilté');
        $usine->categorie = $request->input('categorie');
        $usine->annonce = $request->input('annonce');
        $usine->etat = $request->input('etat');
        $usine->addresse = $request->input('addresse');
        $usine->ville = $request->input('ville');
        $usine->couvernant = $request->input('couvernant');
        $usine->prix = $request->input('prix');
        $usine->superficie_total = $request->input('superficie_total');
        $usine->superficie_batie = $request->input('superficie_batie');
        $usine->superficie_terre = $request->input('superficie_terre');
        $usine->type_industrie = $request->input('type_industrie');
        $usine->equipement = $request->input('equipement');
        $usine->acces_tansport = $request->input('acces_tansport');
        $usine->id_user = $request->input('id_user');
        $usine->user_name = $request->input('user_name');
        $usine->user_lastName = $request->input('user_lastName');
        $usine->user_email = $request->input('user_email');
        $usine->user_phone = $request->input('user_phone');
        $usine->propritair_name = $request->input('propritair_name');
        $usine->proritaire_phone = $request->input('proritaire_phone');
        $usine->save();
        $usineID = $usine->id;
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
                    'id_bien' => $usineID,
                    'src' => $path . $filename,
                ];

            }

        }
        Images_usine::insert($imagesdata);
    }}}