<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appartement extends Model
{
    use HasFactory;

    protected $table = 'appartement';

    protected $primaryKey = 'id';

    protected $fillable = [

        'discription',
        'disponibilté',
        'categorie',
        'annonce',
        'etat',
        'addresse',
        'ville',
        'couvernant',
        'prix',
        'surface',
        'nbr_chombre',
        'nbr_salle_de_bain',
        'meublé',
        'balcon',
        'etage',
        'ascenceur',
        'parking',
        'Proximité',
        'chauffage',
        'climatisation',
        'id_user',
        'user_name',
        'user_lastName',
        'user_email',
        'user_phone',
        'propritair_name',
        'proritaire_phone',
    ];

    public function images_appartement()
    {
        return $this->hasMany(Images_appartement::class);
    }
}
