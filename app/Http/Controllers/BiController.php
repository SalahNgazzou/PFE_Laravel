<?php

namespace App\Http\Controllers;

use App\Models\Biens;
use App\Models\Recherches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BiController extends Controller
{
    public function nombreDeBiens()
    {
        // Nombre de biens à vendre
        $nombreDeBiensAVendre = Biens::where('categorie', 'A vendre')->count();

        // Nombre de biens à louer
        $nombreDeBiensALouer = Biens::where('categorie', 'A Louer')->count();

        // les types des biens plus vendre
        $typeBiensPlusVendu = Biens::select('type_biens', DB::raw('COUNT(*) as count'))
                            ->where('categorie', 'A vendre')
                            ->groupBy('type_biens')
                            ->get();
        // les types des biens plus Louer
        $typeBiensPlusLouer = Biens::select('type_biens', DB::raw('COUNT(*) as count'))
                            ->where('categorie', 'A Louer')
                            ->groupBy('type_biens')
                            ->get();
        // les categories des biens plus demande
        $categoriesPlusDemande = Biens::select('categorie', DB::raw('COUNT(*) as count'))
                               ->groupBy('categorie')
                               ->orderByDesc('count')
                               ->get();

        return response()->json([
            'nombre_de_biens_a_vendre' => $nombreDeBiensAVendre,
            'nombre_de_biens_a_louer' => $nombreDeBiensALouer,
            'typeBiensPlusVendu' =>$typeBiensPlusVendu,
            'typeBiensPlusLouer' =>$typeBiensPlusLouer ,
            'categoriesPLusDemande' =>$categoriesPlusDemande,
        ]);
    }

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
}
