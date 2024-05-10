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
}
