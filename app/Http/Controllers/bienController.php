<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\Models\Images_villa;
use App\Models\Villa;
use Illuminate\Http\Request;

class bienController extends Controller
{
    function ajouterBien(request $request)
    {
        $typeProduit = $request->type_produit;

        // Enregistrez le produit dans la table appropriée en fonction de son type
        switch ($typeProduit) {
            case 'villa':
                $villa = new Villa();
                $villa->discription = $request->input('discription');
                $villa->disponibilté = $request->input('disponibilté');
                $villa->categorie = $request->input('categorie');
                $villa->annonce = $request->input('annonce');
                $villa->etat = $request->input('etat');
                $villa->addresse = $request->input('addresse');
                $villa->ville = $request->input('ville');
                $villa->couvernant = $request->input('couvernant');
                $villa->prix = $request->input('prix');
                $villa->surface = $request->input('surface');
                $villa->nbr_chombre = $request->input('nbr_chombre');
                $villa->nbr_salle_de_bain = $request->input('nbr_salle_de_bain');
                $villa->meublé = $request->input('meublé');
                $villa->jardin = $request->input('jardin');
                $villa->piscin = $request->input('piscin');
                $villa->garage = $request->input('garage');
                $villa->proximité = $request->input('proximité');
                $villa->chauffage = $request->input('chauffage');
                $villa->climatisation = $request->input('climatisation');
                $villa->id_user = $request->input('id_user');
                $villa->user_name = $request->input('user_name');
                $villa->user_lastName = $request->input('user_lastName');
                $villa->user_email = $request->input('user_email');
                $villa->user_phone = $request->input('user_phone');
                $villa->propritair_name = $request->input('propritair_name');
                $villa->proritaire_phone = $request->input('proritaire_phone');

                $villa->save();
                $villaId = $villa->id;
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
                            'id_bien' => $villaId,
                            'src' => $path . $filename,
                        ];

                    }

                }
                Images_villa::insert($imagesdata);
                break;
            case 'appartement':
                $appartement = new Appartement();
                $appartement->descripton = $request->input('descripton');
                $appartement->prix = $request->input('prix');
                // Enregistrez d'autres attributs spécifiques à l'appartement
                $appartement->save();
                break;
            // Ajoutez d'autres cas pour d'autres types de produits si nécessaire
            default:
                // Gérer le cas par défaut
                break;
        }
        return [
            'appartement' => $appartement ?? null,
            'villa' => $villa ?? null,
        ];
    }
}
