<?php

namespace App\Http\Controllers;

use App\Models\Biens;
use App\Models\List_images;
use Illuminate\Http\Request;

class ajouterbiensController extends Controller
{
    function AjouterBiens(request $request)
    {
        $type = $request->type_biens;
        switch ($type) {
            case "Villa":
                $biens = new Biens();
                $biens->type_biens = $request->input("type_biens");
                $biens->description = $request->input('description');
                $biens->disponibilté = $request->input('disponibilté');
                $biens->categorie = $request->input('categorie');
                $biens->annonce = $request->input('annonce');
                $biens->etat = $request->input('etat');
                $biens->addresse = $request->input('addresse');
                $biens->ville = $request->input('ville');
                $biens->couvernant = $request->input('gouvernorats');
                $biens->prix = $request->input('prix');
                $biens->surface = $request->input('surface');
                $biens->nbr_chombre = $request->input('nbr_chombre');
                $biens->nbr_salle_de_bain = $request->input('nbr_salle_de_bain');
                $biens->meublé = $request->input('meublé');
                $biens->jardin = $request->input('jardin');
                $biens->piscin = $request->input('piscin');
                $biens->garage = $request->input('garage');
                $biens->proximité = $request->input('proximité');
                $biens->chauffage = $request->input('chauffage');
                $biens->climatisation = $request->input('climatisation');
                $biens->id_user = $request->input('id_user');
                $biens->user_name = $request->input('user_name');
                $biens->user_lastName = $request->input('user_lastName');
                $biens->user_email = $request->input('user_email');
                $biens->user_phone = $request->input('user_phone');
                $biens->propritair_name = $request->input('propritair_name');
                $biens->proritaire_phone = $request->input('proritaire_phone');
                $biens->save();
                $biensId = $biens->id;
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
                            'id_bien' => $biensId,
                            'src' => $path . $filename,
                        ];

                    }

                }
                List_images::insert($imagesdata);
                break;
            case "Appartement":
                $biens = new Biens();
                $biens->description = $request->input('description');
                $biens->disponibilté = $request->input('disponibilté');
                $biens->categorie = $request->input('categorie');
                $biens->annonce = $request->input('annonce');
                $biens->etat = $request->input('etat');
                $biens->addresse = $request->input('addresse');
                $biens->ville = $request->input('ville');
                $biens->couvernant = $request->input('couvernant');
                $biens->prix = $request->input('prix');
                $biens->surface = $request->input('surface');
                $biens->nbr_chombre = $request->input('nbr_chombre');
                $biens->nbr_salle_de_bain = $request->input('nbr_salle_de_bain');
                $biens->meublé = $request->input('meublé');
                $biens->balcon = $request->input('balcon');
                $biens->etage = $request->input('etage');
                $biens->ascenceur = $request->input('ascenceur');
                $biens->parking = $request->input('parking');
                $biens->proximité = $request->input('proximité');
                $biens->chauffage = $request->input('chauffage');
                $biens->climatisation = $request->input('climatisation');
                $biens->id_user = $request->input('id_user');
                $biens->user_name = $request->input('user_name');
                $biens->user_lastName = $request->input('user_lastName');
                $biens->user_email = $request->input('user_email');
                $biens->user_phone = $request->input('user_phone');
                $biens->propritair_name = $request->input('propritair_name');
                $biens->proritaire_phone = $request->input('proritaire_phone');
                $biens->save();
                $biensID = $biens->id;
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
                            'id_bien' => $biensID,
                            'src' => $path . $filename,
                        ];

                    }

                }
                List_images::insert($imagesdata);
                break;
            case "Duplex":
                $biens = new Biens();
                $biens->description = $request->input('description');
                $biens->disponibilté = $request->input('disponibilté');
                $biens->categorie = $request->input('categorie');
                $biens->annonce = $request->input('annonce');
                $biens->etat = $request->input('etat');
                $biens->addresse = $request->input('addresse');
                $biens->ville = $request->input('ville');
                $biens->couvernant = $request->input('couvernant');
                $biens->prix = $request->input('prix');
                $biens->surface = $request->input('surface');
                $biens->nbr_chombre = $request->input('nbr_chombre');
                $biens->nbr_salle_de_bain = $request->input('nbr_salle_de_bain');
                $biens->meublé = $request->input('meublé');
                $biens->vue = $request->input('vue');
                $biens->terrase = $request->input('terrase');
                $biens->balcon = $request->input('balcon');
                $biens->etage = $request->input('etage');
                $biens->ascenceur = $request->input('ascenceur');
                $biens->parking = $request->input('parking');
                $biens->proximité = $request->input('proximité');
                $biens->chauffage = $request->input('chauffage');
                $biens->climatisation = $request->input('climatisation');
                $biens->id_user = $request->input('id_user');
                $biens->user_name = $request->input('user_name');
                $biens->user_lastName = $request->input('user_lastName');
                $biens->user_email = $request->input('user_email');
                $biens->user_phone = $request->input('user_phone');
                $biens->propritair_name = $request->input('propritair_name');
                $biens->proritaire_phone = $request->input('proritaire_phone');
                $biens->save();
                $biensID = $biens->id;
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
                            'id_bien' => $biensID,
                            'src' => $path . $filename,
                        ];

                    }

                }
                List_images::insert($imagesdata);
                break;
            case "Parking/Garage":
                $biens = new Biens();
                $biens->description = $request->input('description');
                $biens->disponibilté = $request->input('disponibilté');
                $biens->categorie = $request->input('categorie');
                $biens->annonce = $request->input('annonce');
                $biens->etat = $request->input('etat');
                $biens->addresse = $request->input('addresse');
                $biens->ville = $request->input('ville');
                $biens->couvernant = $request->input('couvernant');
                $biens->prix = $request->input('prix');
                $biens->nbr_place = $request->input('nbr_place');
                $biens->dimension = $request->input('dimension');
                $biens->secuirité = $request->input('secuirité');
                $biens->accessibilité = $request->input('accessibilité');
                $biens->service = $request->input('service');
                $biens->id_user = $request->input('id_user');
                $biens->user_name = $request->input('user_name');
                $biens->user_lastName = $request->input('user_lastName');
                $biens->user_email = $request->input('user_email');
                $biens->user_phone = $request->input('user_phone');
                $biens->propritair_name = $request->input('propritair_name');
                $biens->proritaire_phone = $request->input('proritaire_phone');
                $biens->save();
                $biensID = $biens->id;
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
                            'id_bien' => $biensID,
                            'src' => $path . $filename,
                        ];

                    }

                }
                List_images::insert($imagesdata);
                break;
            case "Terrain":
                $terrain = new Biens();
                $terrain->description = $request->input('description');
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
                List_images::insert($imagesdata);
                break;
            case "Immeuble":
                $biens = new Biens();
                $biens->description = $request->input('description');
                $biens->disponibilté = $request->input('disponibilté');
                $biens->categorie = $request->input('categorie');
                $biens->annonce = $request->input('annonce');
                $biens->etat = $request->input('etat');
                $biens->addresse = $request->input('addresse');
                $biens->ville = $request->input('ville');
                $biens->couvernant = $request->input('couvernant');
                $biens->prix = $request->input('prix');
                $biens->nbr_appartement = $request->input('nbr_appartement');
                $biens->nbr_etage = $request->input('nbr_etage');
                $biens->année_construction = $request->input('année_construction');
                $biens->superficie_total = $request->input('superficie_total');
                $biens->superficie_appartement = $request->input('superficie_appartement');
                $biens->type_immeuble = $request->input('type_immeuble');
                $biens->espace_commun = $request->input('espace_commun');
                $biens->ascenceur = $request->input('ascenceur');
                $biens->parking = $request->input('parking');
                $biens->id_user = $request->input('id_user');
                $biens->user_name = $request->input('user_name');
                $biens->user_lastName = $request->input('user_lastName');
                $biens->user_email = $request->input('user_email');
                $biens->user_phone = $request->input('user_phone');
                $biens->propritair_name = $request->input('propritair_name');
                $biens->proritaire_phone = $request->input('proritaire_phone');
                $biens->save();
                $immeubleID = $biens->id;
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
                List_images::insert($imagesdata);
                break;
            case "Local Commercial ":
                $biens = new Biens();
                $biens->description = $request->input('description');
                $biens->disponibilté = $request->input('disponibilté');
                $biens->categorie = $request->input('categorie');
                $biens->annonce = $request->input('annonce');
                $biens->etat = $request->input('etat');
                $biens->addresse = $request->input('addresse');
                $biens->ville = $request->input('ville');
                $biens->couvernant = $request->input('couvernant');
                $biens->prix = $request->input('prix');
                $biens->superficie = $request->input('superficie');
                $biens->type_commerce_autorisé = $request->input('type_commerce_autorisé');
                $biens->equipement = $request->input('equipement');
                $biens->visibilité = $request->input('visibilité');
                $biens->parking = $request->input('parking');
                $biens->id_user = $request->input('id_user');
                $biens->user_name = $request->input('user_name');
                $biens->user_lastName = $request->input('user_lastName');
                $biens->user_email = $request->input('user_email');
                $biens->user_phone = $request->input('user_phone');
                $biens->propritair_name = $request->input('propritair_name');
                $biens->proritaire_phone = $request->input('proritaire_phone');
                $biens->save();
                $local_commercialID = $biens->id;
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
                List_images::insert($imagesdata);
                break;
            case "Entropot":
                $biens = new Biens();
                $biens->description = $request->input('description');
                $biens->disponibilté = $request->input('disponibilté');
                $biens->categorie = $request->input('categorie');
                $biens->annonce = $request->input('annonce');
                $biens->etat = $request->input('etat');
                $biens->addresse = $request->input('addresse');
                $biens->ville = $request->input('ville');
                $biens->couvernant = $request->input('couvernant');
                $biens->prix = $request->input('prix');
                $biens->superficie = $request->input('superficie');
                $biens->capacité_stockage = $request->input('capacité_stockage');
                $biens->heuteur = $request->input('heuteur');
                $biens->condition_stockage = $request->input('condition_stockage');
                $biens->equipement = $request->input('equipement');
                $biens->securité = $request->input('securité');
                $biens->id_user = $request->input('id_user');
                $biens->user_name = $request->input('user_name');
                $biens->user_lastName = $request->input('user_lastName');
                $biens->user_email = $request->input('user_email');
                $biens->user_phone = $request->input('user_phone');
                $biens->propritair_name = $request->input('propritair_name');
                $biens->proritaire_phone = $request->input('proritaire_phone');
                $biens->save();
                $biensID = $biens->id;
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
                            'id_bien' => $biensID,
                            'src' => $path . $filename,
                        ];

                    }

                }
                List_images::insert($imagesdata);
                break;
            case "Usine":
                $biens = new Biens();
                $biens->description = $request->input('description');
                $biens->disponibilté = $request->input('disponibilté');
                $biens->categorie = $request->input('categorie');
                $biens->annonce = $request->input('annonce');
                $biens->etat = $request->input('etat');
                $biens->addresse = $request->input('addresse');
                $biens->ville = $request->input('ville');
                $biens->couvernant = $request->input('couvernant');
                $biens->prix = $request->input('prix');
                $biens->superficie_total = $request->input('superficie_total');
                $biens->superficie_batie = $request->input('superficie_batie');
                $biens->superficie_terre = $request->input('superficie_terre');
                $biens->type_industrie = $request->input('type_industrie');
                $biens->equipement = $request->input('equipement');
                $biens->acces_tansport = $request->input('acces_tansport');
                $biens->id_user = $request->input('id_user');
                $biens->user_name = $request->input('user_name');
                $biens->user_lastName = $request->input('user_lastName');
                $biens->user_email = $request->input('user_email');
                $biens->user_phone = $request->input('user_phone');
                $biens->propritair_name = $request->input('propritair_name');
                $biens->proritaire_phone = $request->input('proritaire_phone');
                $biens->save();
                $biensID = $biens->id;
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
                            'id_bien' => $biensID,
                            'src' => $path . $filename,
                        ];

                    }

                }
                List_images::insert($imagesdata);
                break;
            default:
                // Gérer le cas par défaut
                break;
              
        }
        return[
            'biens'=> $biens,
        ];
    }



   
}