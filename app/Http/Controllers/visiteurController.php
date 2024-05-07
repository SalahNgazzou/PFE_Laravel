<?php

namespace App\Http\Controllers;

use App\Models\Biens;
use App\Models\Estimations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class visiteurController extends Controller
{

    public function search(Request $request)
    {
        $typeBiens = $request->input('type_biens');
        $categorie = $request->input('categorie');
        $gouvernant = $request->input('gouvernant');
        $prixMin = $request->input('prix_min');
        $prixMax = $request->input('prix_max');

        // Requête pour sélectionner les biens en fonction des critères
        $biens = Biens::where('type_biens', $typeBiens)
            ->where('annonce', "Publier")
            ->where('categorie', $categorie)
            ->where('disponibilté', "En cours")
            ->where('gouvernant', $gouvernant)
            ->whereBetween('prix', [$prixMin, $prixMax])
            ->with('users')
            ->with('liste_images') // Charger les images associées à chaque bien
            ->get();

        if ($biens->isEmpty()) { // Vérifier si aucun résultat n'a été trouvé
            // Requête pour sélectionner tous les biens de type "villa"
            $biens = Biens::where('type_biens', $typeBiens)
                ->where('annonce', "Publier")
                ->with('users')
                ->with('liste_images') // Charger les images associées à chaque bien
                ->get();
        }

        return response()->json($biens);
    }

    public function list_biens(Request $request)
    {
        $biens = [];
        $biens = Biens::with('liste_images')
            ->with('users')
            ->get();

        return $biens;
    }
    public function getBiens($id)
    {
        // Récupérer les images associées au bien
        $images = DB::table('biens')
            ->join('list_images', 'biens.id', '=', 'list_images.id_bien')
            ->select('list_images.*')
            ->where('biens.id', $id)
            ->get();

        // Récupérer les détails du bien
        $result = DB::table('biens')
            ->where('biens.id', $id)
            ->first();

        // Vérifier si le bien existe
        if (!$result) {
            return response()->json(['error' => 'Bien non trouvé'], 404);
        }

        // Récupérer les détails de l'utilisateur qui a ajouté le bien
        $userDetails = DB::table('users')
            ->where('id', $result->id_user) // Assurez-vous que le champ user_id correspond à l'ID de l'utilisateur associé au bien dans votre base de données
            ->first();

        // Ajouter les détails de l'utilisateur aux résultats
        $result->user_details = $userDetails;
        $result->images = $images;

        return response()->json($result);
    }

    public function add_estimation(Request $request)
    {
        $estimation = new Estimations();
        $estimation->name = $request->input('name');
        $estimation->last_name = $request->input('last_name');
        $estimation->email = $request->input('email');
        $estimation->type = $request->input('type');
        $estimation->categorie = $request->input('categorie');
        $estimation->adresse = $request->input('adresse');
        $estimation->message = $request->input('message');
        $estimation->etat = $request->input('etat');
        $estimation->save();
        // Vérifie si l'insertion a réussi
        if ($estimation->wasRecentlyCreated) {
            // L'insertion a réussi, affiche un message de succès
            return Redirect::back()->with('success', 'L\'estimation a été ajoutée avec succès.');
        } else {
            // L'insertion a échoué, affiche un message d'erreur
            return Redirect::back()->with('error', 'Une erreur est survenue lors de l\'ajout de l\'estimation.');
        }
    }

}
