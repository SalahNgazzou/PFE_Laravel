<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\Models\Duplex;
use App\Models\Entropot;
use App\Models\Images_appartement;
use App\Models\Images_duplex;
use App\Models\Images_entropot;
use App\Models\Images_immeuble;
use App\Models\Images_local_commercial;
use App\Models\images_parking_garage;
use App\Models\Images_terrain;
use App\Models\Images_usine;
use App\Models\Images_villa;
use App\Models\Immeuble;
use App\Models\Local_commercial;
use App\Models\Parking_Garage;
use App\Models\Terrain;
use App\Models\Usine;
use App\Models\Villa;
use Illuminate\Http\Request;

class modifierbiensController extends Controller
{
    function ModifierBiens(request $request, $id)
    {
        $typeProduit = $request->type_produit;
        switch ($typeProduit) {
            case "Villa":
                $villa = Villa::findOrFail($id);
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
            case "Appartement":
                $appartement = Appartement::find($id);
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
                break;
            case "Duplex":
                $duplex = Duplex::find($id);
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
                break;
            case "Parking/Garage":
                $parking = Parking_Garage::find($id);
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
                break;
            case "Terrain":
                $terrain = Terrain::find($id);
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
                break;
            case "Immeuble":
                $immeuble = Immeuble::find($id);
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
                break;
            case "Local Commercial ":
                $local_commercial = Local_commercial::find($id);
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
                break;
            case "Entropot":
                $entropot = Entropot::find($id);
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
                break;
            case "Usine":
                $usine = Usine::find($id);
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
                break;
            default:
                // Gérer le cas par défaut
                break;
        }
       
    }
}