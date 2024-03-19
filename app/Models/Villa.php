<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Villa extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'villa';

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
        'jardin',
        'piscin',
        'garage',
        'proximité',
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

    public function images_villa()
    {
        return $this->hasMany(Images_villa::class);
    }
}
