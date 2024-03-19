<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entropot extends Model
{
    use HasFactory;

    protected $table = 'entropot';

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
        'capacité_stockage',
        'heuteur',
        'condition_stockage',
        'equipement',
        'securité',
        'id_user',
        'user_name',
        'user_lastName',
        'user_email',
        'user_phone',
        'propritair_name',
        'proritaire_phone',
    ];

    public function images_entropot()
    {
        return $this->hasMany(Images_entropot::class);
    }
}
