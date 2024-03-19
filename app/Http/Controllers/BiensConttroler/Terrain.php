<?php

namespace App\Http\Controllers\BiensConttroler;

use App\Http\Controllers\Controller;

use App\Models\Images_terrain;
use App\Models\Terrain;
use Illuminate\Http\Request;

class TerrainController extends Controller
{
function ajouterTerrain(Request $request){
    $typeProduit = $request->type_produit;
    if($typeProduit == "Terrain"){
        $terrain = new Terrain();
        $terrain->discription = $request->input('discription');
        $terrain->disponibilté = $request->input('disponibilté');
        $terrain->categorie = $request->input('categorie');
        $terrain->annonce = $request->input('annonce');
        $terrain->etat = $request->input('etat');
        $terrain->addresse = $request->input('addresse');
        $terrain->ville = $request->input('ville');
        $terrain->couvernant = $request->input('couvernant');
        $terrain->prix = $request->input('prix');
        $terrain->superficie = $request->input('superficie');
        $terrain->usage_autorisé = $request->input('usage_autorisé');
        $terrain->service_public = $request->input('service_public');
        $terrain->accessibilité = $request->input('accessibilité');
        $terrain->service = $request->input('cloture');
        $terrain->titre_proprité = $request->input('titre_proprité');
        $terrain->id_user = $request->input('id_user');
        $terrain->user_name = $request->input('user_name');
        $terrain->user_lastName = $request->input('user_lastName');
        $terrain->user_email = $request->input('user_email');
        $terrain->user_phone = $request->input('user_phone');
        $terrain->propritair_name = $request->input('propritair_name');
        $terrain->proritaire_phone = $request->input('proritaire_phone');
        $terrain->save();
        $terrainID = $terrain->id;
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
                    'id_bien' => $terrainID,
                    'src' => $path . $filename,
                ];

            }

        }
        Images_terrain::insert($imagesdata);
    }
}
}