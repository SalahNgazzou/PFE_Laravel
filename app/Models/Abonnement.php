<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    use HasFactory;
    protected $table = 'abonnements';
    protected $fillable = [
        'nom_agence',
        'date_debut',
        'date_fin',
        'statut',
        'id_user',
    ];
}
