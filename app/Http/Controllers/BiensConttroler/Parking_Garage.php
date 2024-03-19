<?php

namespace App\Http\Controllers\BiensConttroler;

use App\Http\Controllers\Controller;
use App\Models\images_parking_garage;
use App\Models\Parking_Garage;
use Illuminate\Http\Request;

class Parking_GarageController extends Controller
{
function ajouterParking(Request $request){
    $typeProduit = $request->type_produit;
    if($typeProduit == "Parking/Garage"){
        $parking = new Parking_Garage();
        $parking->discription = $request->input('discription');
        $parking->disponibilté = $request->input('disponibilté');
        $parking->categorie = $request->input('categorie');
        $parking->annonce = $request->input('annonce');
        $parking->etat = $request->input('etat');
        $parking->addresse = $request->input('addresse');
        $parking->ville = $request->input('ville');
        $parking->couvernant = $request->input('couvernant');
        $parking->prix = $request->input('prix');
        $parking->nbr_place = $request->input('nbr_place');
        $parking->dimension = $request->input('dimension');
        $parking->secuirité = $request->input('secuirité');
        $parking->accessibilité = $request->input('accessibilité');
        $parking->service = $request->input('service');
        $parking->id_user = $request->input('id_user');
        $parking->user_name = $request->input('user_name');
        $parking->user_lastName = $request->input('user_lastName');
        $parking->user_email = $request->input('user_email');
        $parking->user_phone = $request->input('user_phone');
        $parking->propritair_name = $request->input('propritair_name');
        $parking->proritaire_phone = $request->input('proritaire_phone');
        $parking->save();
        $parkingID = $parking->id;
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
                    'id_bien' => $parkingID,
                    'src' => $path . $filename,
                ];

            }

        }
        images_parking_garage::insert($imagesdata);
    }
}
}