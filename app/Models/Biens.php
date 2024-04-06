<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biens extends Model
{
    use HasFactory;

    protected $table = 'biens';

    protected $primaryKey = 'id';

    protected $fillable = [

        "type_biens",
        'description',
        'disponibilté',
        'categorie',
        'annonce',
        'etat',
        'addresse',
        'ville',
        'gouvernant',
        'prix',
        'surface',
        'nbr_chombre',
        'nbr_salle_de_bain',
        'meublé',
        'jardin',
        'piscin',
        'garage',
        'balcon',
        'etage',
        'vue',
        'terasse',
        'ascenceur',
        'parking',
        'proximité',
        'chauffage',
        'climatisation',
        'nbr_place',
        'dimension',
        'secuirité',
        'accessibilité',
        'service',
        'superficie',
        'type_commerce_autorisé',
        'visibilité',
        'usage_autorisé',
        'service_public',
        'cloture',
        'titre_proprité',
        'nbr_appartement',
        'nbr_etage',
        'année_construction',
        'superficie_total',
        'superficie_appartement',
        'type_immeuble',
        'espace_commun',
        'superficie_batie',
        'superficie_terre',
        'type_industrie',
        'equipement',
        'acces_tansport',
        'capacité_stockage',
        'heuteur',
        'condition_stockage',
        'id_user',
        'propritair_name',
        'proritaire_phone',
    ];

    public function liste_images()
    {
        return $this->hasMany(List_images::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
