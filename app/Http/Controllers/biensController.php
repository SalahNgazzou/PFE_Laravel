<?php

namespace App\Http\Controllers;

use App\Models\Biens;
use App\Models\List_images;
use App\Models\User;
use Illuminate\Http\Request;

class biensController extends Controller
{
    function add_Biens(request $request)
    {
        $biens = new Biens();
        $biens->type_biens = $request->input("type_biens");
        $biens->description = $request->input('description');
        $biens->disponibilté = $request->input('disponibilté');
        $biens->categorie = $request->input('categorie');
        $biens->annonce = $request->input('annonce');
        $biens->etat = $request->input('etat');
        $biens->addresse = $request->input('addresse');
        $biens->ville = $request->input('ville');
        $biens->gouvernant = $request->input('gouvernant');
        $biens->prix = $request->input('prix');

        switch ($request->type_biens) {
            case "Villa":
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
                break;
            case "Appartement":
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
                break;
            case "Duplex":
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
                break;
            case "Parking/Garage":
                $biens->nbr_place = $request->input('nbr_place');
                $biens->dimension = $request->input('dimension');
                $biens->secuirité = $request->input('secuirité');
                $biens->accessibilité = $request->input('accessibilité');
                $biens->service = $request->input('service');
                break;
            case "Terrain":
                $biens->superficie = $request->input('superficie');
                $biens->usage_autorisé = $request->input('usage_autorisé');
                $biens->service_public = $request->input('service_public');
                $biens->accessibilité = $request->input('accessibilité');
                $biens->service = $request->input('cloture');
                $biens->titre_proprité = $request->input('titre_proprité');
                break;
            case "Immeuble":
                $biens->nbr_appartement = $request->input('nbr_appartement');
                $biens->nbr_etage = $request->input('nbr_etage');
                $biens->année_construction = $request->input('année_construction');
                $biens->superficie_total = $request->input('superficie_total');
                $biens->superficie_appartement = $request->input('superficie_appartement');
                $biens->type_immeuble = $request->input('type_immeuble');
                $biens->espace_commun = $request->input('espace_commun');
                $biens->ascenceur = $request->input('ascenceur');
                $biens->parking = $request->input('parking');
                break;
            case "Local Commercial ":
                $biens->superficie = $request->input('superficie');
                $biens->type_commerce_autorisé = $request->input('type_commerce_autorisé');
                $biens->equipement = $request->input('equipement');
                $biens->visibilité = $request->input('visibilité');
                $biens->parking = $request->input('parking');
                break;
            case "Entropot":
                $biens->superficie = $request->input('superficie');
                $biens->capacité_stockage = $request->input('capacité_stockage');
                $biens->heuteur = $request->input('heuteur');
                $biens->condition_stockage = $request->input('condition_stockage');
                $biens->equipement = $request->input('equipement');
                $biens->securité = $request->input('securité');
                break;
            case "Usine":
                $biens->superficie_total = $request->input('superficie_total');
                $biens->superficie_batie = $request->input('superficie_batie');
                $biens->superficie_terre = $request->input('superficie_terre');
                $biens->type_industrie = $request->input('type_industrie');
                $biens->equipement = $request->input('equipement');
                $biens->acces_tansport = $request->input('acces_tansport');
                break;
            default:
                // Gérer le cas par défaut
                break;
        }

        $biens->id_user = $request->input("user_id");
        $biens->propritair_name = $request->input('propritair_name');
        $biens->proritaire_phone = $request->input('proritaire_phone');
        $biens->save();

        // Enregistrer les images de la villa
        $imagesdata = [];
        if ($files = $request->file('images')) {
            foreach ($files as $key => $file) {
                // Store each image in the storage directory
                $extension = $file->getClientOriginalExtension();
                $filename = $key . '_' . time() . '.' . $extension;
                $path = "uploads/Biens/";
                $file->move($path, $filename);
                $imagesdata[] = [
                    'id_bien' => $biens->id,
                    'src' => $path . $filename,
                ];
            }
        }
        List_images::insert($imagesdata);
        return  $biens;
            
       
    }

    function listebiens()
    {
        $bien = Biens::all();
        return $bien;
    }

    function edit_Biens(request $request, $id)
    {
        $biens = Biens::find($id);
        $biens->type_biens = $request->input("type_biens");
        $biens->description = $request->input('description');
        $biens->disponibilté = $request->input('disponibilté');
        $biens->categorie = $request->input('categorie');
        $biens->annonce = $request->input('annonce');
        $biens->etat = $request->input('etat');
        $biens->addresse = $request->input('addresse');
        $biens->ville = $request->input('ville');
        $biens->gouvernant = $request->input('gouvernant');
        $biens->prix = $request->input('prix');

        switch ($request->type_biens) {
            case "Villa":
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
                break;
            case "Appartement":
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
                break;
            case "Duplex":
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
                break;
            case "Parking/Garage":
                $biens->nbr_place = $request->input('nbr_place');
                $biens->dimension = $request->input('dimension');
                $biens->secuirité = $request->input('secuirité');
                $biens->accessibilité = $request->input('accessibilité');
                $biens->service = $request->input('service');
                break;
            case "Terrain":
                $biens->superficie = $request->input('superficie');
                $biens->usage_autorisé = $request->input('usage_autorisé');
                $biens->service_public = $request->input('service_public');
                $biens->accessibilité = $request->input('accessibilité');
                $biens->service = $request->input('cloture');
                $biens->titre_proprité = $request->input('titre_proprité');
                break;
            case "Immeuble":
                $biens->nbr_appartement = $request->input('nbr_appartement');
                $biens->nbr_etage = $request->input('nbr_etage');
                $biens->année_construction = $request->input('année_construction');
                $biens->superficie_total = $request->input('superficie_total');
                $biens->superficie_appartement = $request->input('superficie_appartement');
                $biens->type_immeuble = $request->input('type_immeuble');
                $biens->espace_commun = $request->input('espace_commun');
                $biens->ascenceur = $request->input('ascenceur');
                $biens->parking = $request->input('parking');
                break;
            case "Local Commercial ":
                $biens->superficie = $request->input('superficie');
                $biens->type_commerce_autorisé = $request->input('type_commerce_autorisé');
                $biens->equipement = $request->input('equipement');
                $biens->visibilité = $request->input('visibilité');
                $biens->parking = $request->input('parking');
                break;
            case "Entropot":
                $biens->superficie = $request->input('superficie');
                $biens->capacité_stockage = $request->input('capacité_stockage');
                $biens->heuteur = $request->input('heuteur');
                $biens->condition_stockage = $request->input('condition_stockage');
                $biens->equipement = $request->input('equipement');
                $biens->securité = $request->input('securité');
                break;
            case "Usine":
                $biens->superficie_total = $request->input('superficie_total');
                $biens->superficie_batie = $request->input('superficie_batie');
                $biens->superficie_terre = $request->input('superficie_terre');
                $biens->type_industrie = $request->input('type_industrie');
                $biens->equipement = $request->input('equipement');
                $biens->acces_tansport = $request->input('acces_tansport');
                break;
            default:
                // Gérer le cas par défaut
                break;
        }

        $biens->id_user = $request->input("user_id");
        $biens->propritair_name = $request->input('propritair_name');
        $biens->proritaire_phone = $request->input('proritaire_phone');
        $biens->save();

        // Enregistrer les images de la villa
        $imagesdata = [];
        if ($files = $request->file('images')) {
            foreach ($files as $key => $file) {
                // Store each image in the storage directory
                $extension = $file->getClientOriginalExtension();
                $filename = $key . '_' . time() . '.' . $extension;
                $path = "uploads/Biens/";
                $file->move($path, $filename);
                $imagesdata[] = [
                    'id_bien' => $biens->id,
                    'src' => $path . $filename,
                ];
            }
        }
        List_images::insert($imagesdata);
        return [
            'biens' => $biens,
        ];
    }
// function pour selection un biens aves ces images 
    public function getBiens($id)
    {
        $biens = Biens::where('id', $id)->get();

        $images = List_images::where('id_bien', $id)
        ->select('src')
        ->get();
        return   $biens;
           
     
    }

// finction pour selection les biens de chaque user 

public function getBiensParUtilisateur()
{
    // Récupérer tous les utilisateurs avec leurs biens
    $utilisateurs = User::with('biens')->get();

    // Retourner les utilisateurs avec leurs biens
    return response()->json($utilisateurs);
}

public function ChangeAnnonce($id)
{
    $biens = Biens::findOrFail($id);

    // Inversion du statut du compte
    $biens->annonce = $biens->annonce === 'Publier' ? 'Masquer' : 'Publier';
    $biens->save();

    return response()->json(['message' => 'Statut du compte mis à jour avec succès'], 200);
}

}
