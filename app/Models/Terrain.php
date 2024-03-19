<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terrain extends Model
{
    use HasFactory;

    protected $table = 'terrain';

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
        'superficie',
        'usage_autorisé',
        'service_public',
        'cloture',
        'titre_proprité',
        'id_user',
        'user_name',
        'user_lastName',
        'user_email',
        'user_phone',
        'propritair_name',
        'proritaire_phone',

    ];

    public function images_terrain()
    {
        return $this->hasMany(Images_terrain::class);
    }
}
