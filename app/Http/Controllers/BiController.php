<?php

namespace App\Http\Controllers;

use App\Models\Biens;
use App\Models\Recherches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class BiController extends Controller
{


    public function BiensPlusDemander()
    {
        // Nombre de biens à vendre
        $nombreVilla = Recherches::where('type', 'Villa')->count();

        // Nombre de biens à louer
        $nombreAppartement = Recherches::where('type', 'Appartement')->count();
        $nombreTerrain = Recherches::where('type', 'Terrain')->count();
        $nombreImmeuble = Recherches::where('type', 'Immeuble')->count();
        $nombreDuplex = Recherches::where('type', 'Duplex')->count();
        $nombreLocalCommercial = Recherches::where('type', 'Local Commercial')->count();
        $nombreUsine = Recherches::where('type', 'Usine')->count();
        $nombreParkingGarage = Recherches::where('type', 'Parking/Garage')->count();
        $nombreEntropot = Recherches::where('type', 'Entropot')->count();

        return response()->json([
            'villa' => $nombreVilla,
            'appartement' => $nombreAppartement,
            'terrain' => $nombreTerrain,
            'immeuble' => $nombreImmeuble,
            'duplex' => $nombreDuplex,
            'local_commercial' => $nombreLocalCommercial,
            'usine' => $nombreUsine,
            'parking_garage' => $nombreParkingGarage,
            'entropot' => $nombreEntropot,
        ]);
    }

    public function nombreBiensDisponibles()
    {
        $nombreBiensDisponibles = Biens::where('disponibilté', 'En cours')
        ->where('annonce', 'Publier')
        ->count();
        return $nombreBiensDisponibles;
    }

    public function nombreBiensAvendre()
    {
        $nombreBiensAvendre = Biens::where('disponibilté', 'En cours')
            ->where('categorie', 'A vendre ')
            ->where('annonce', 'Publier')
            ->count();
        return $nombreBiensAvendre;
    }

    public function nombreBiensAlouer()
    {
        $nombreBiensAlouer = Biens::where('disponibilté', 'En cours')
            ->where('categorie', 'A Louer ')
            ->where('annonce', 'Publier')
            ->count();
        return $nombreBiensAlouer;
    }

    public function typesBiensLesPlusVendus()
    {
        // Récupérer les types de biens avec le nombre total de ventes, triés par nombre de ventes décroissant
        $nombreVillasVendues = Biens::where('type_biens', 'Villa')
        ->where('disponibilté', 'Vendu')
        ->count();
        $nombreAppartementsVendues = Biens::where('type_biens', 'Appartement')
        ->where('disponibilté', 'Vendu')
        ->count();
        $nombreTerrainVendues = Biens::where('type_biens', 'Terrain')
        ->where('disponibilté', 'Vendu')
        ->count();
        $nombreLocalVendues = Biens::where('type_biens', 'Local Commercial')
        ->where('disponibilté', 'Vendu')
        ->count();
        $nombreDuplexVendues = Biens::where('type_biens', 'Duplex')
        ->where('disponibilté', 'Vendu')
        ->count();
        $nombreImmeubleVendues = Biens::where('type_biens', 'Immeuble')
        ->where('disponibilté', 'Vendu')
        ->count();
        $nombreUsineVendues = Biens::where('type_biens', 'Usine')
        ->where('disponibilté', 'Vendu')
        ->count();
        $nombreEntropotVendues = Biens::where('type_biens', 'Entropot')
        ->where('disponibilté', 'Vendu')
        ->count();
        $nombreParkingVendues = Biens::where('type_biens', 'Parking/Garage')
        ->where('disponibilté', 'Vendu')
        ->count();
    // Retourner le résultat sous forme de réponse JSON
 
    return response()->json([
        'nombre_villas_vendues' => $nombreVillasVendues,
        'nombre_appartements_vendues' => $nombreAppartementsVendues,
        'nombre_terrain_vendues' => $nombreTerrainVendues,
        'nombre_LocalCommercial_vendues' => $nombreLocalVendues,
        'nombre_duplex_vendues' => $nombreDuplexVendues,
        'nombre_immeuble_vendues' => $nombreImmeubleVendues,
        'nombre_usine_vendues' => $nombreUsineVendues,
        'nombre_entropot_vendues' => $nombreEntropotVendues,
        'nombre_parking_vendues' => $nombreParkingVendues,

    ]);
    }

    public function typesBiensLesPluslouer()
    {
        // Récupérer les types de biens avec le nombre total de ventes, triés par nombre de ventes décroissant
        $nombreVillasLouée = Biens::where('type_biens', 'Villa')
        ->where('disponibilté', 'Louée')
        ->count();
        $nombreAppartementsLouée = Biens::where('type_biens', 'Appartement')
        ->where('disponibilté', 'Louée')
        ->count();
        $nombreTerrainLouée = Biens::where('type_biens', 'Terrain')
        ->where('disponibilté', 'Louée')
        ->count();
        $nombreLocalLouée = Biens::where('type_biens', 'Local Commercial')
        ->where('disponibilté', 'Louée')
        ->count();
        $nombreDuplexLouée = Biens::where('type_biens', 'Duplex')
        ->where('disponibilté', 'Louée')
        ->count();
        $nombreImmeubleLouée = Biens::where('type_biens', 'Immeuble')
        ->where('disponibilté', 'Louée')
        ->count();
        $nombreUsineLouée = Biens::where('type_biens', 'Usine')
        ->where('disponibilté', 'Louée')
        ->count();
        $nombreEntropotLouée = Biens::where('type_biens', 'Entropot')
        ->where('disponibilté', 'Louée')
        ->count();
        $nombreParkingLouée = Biens::where('type_biens', 'Parking/Garage')
        ->where('disponibilté', 'Louée')
        ->count();
    // Retourner le résultat sous forme de réponse JSON
 
    return response()->json([
        'nombre_villas_Louée' => $nombreVillasLouée,
        'nombre_appartements_Louée' => $nombreAppartementsLouée,
        'nombre_terrain_Louée' => $nombreTerrainLouée,
        'nombre_LocalCommercial_Louée' => $nombreLocalLouée,
        'nombre_duplex_Louée' => $nombreDuplexLouée,
        'nombre_immeuble_Louée' => $nombreImmeubleLouée,
        'nombre_usine_Louée' => $nombreUsineLouée,
        'nombre_entropot_Louée' => $nombreEntropotLouée,
        'nombre_parking_Louée' => $nombreParkingLouée,

    ]);
    }
    public function categorieDemander(){
        $nombreAvendre = Recherches::where('categorie', 'A Vendre')
        ->count();
        $nombreAlouer = Recherches::where('categorie', 'A Louer')
        ->count();
        return response()->json([
            'bien_alouer'=>$nombreAlouer,
            'bien_avendre'=>$nombreAvendre,
        ]);
    }
}
