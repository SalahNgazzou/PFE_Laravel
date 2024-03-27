<?php

namespace App\Http\Controllers;

use App\Models\Biens;
use Illuminate\Http\Request;

class biensController extends Controller
{
    function listebiens()
    {
        $bien = Biens::all();
        return $bien;
    }
}
