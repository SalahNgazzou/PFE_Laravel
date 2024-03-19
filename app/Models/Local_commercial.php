<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local_commercial extends Model
{
    use HasFactory;

    protected $table = 'local_commercial';

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
        'type_commerce_autorisé',
        'equipement',
        'visibilité',
        'parking',
        'id_user',
        'user_name',
        'user_lastName',
        'user_email',
        'user_phone',
        'propritair_name',
        'proritaire_phone',

    ];

    public function images_local_commercial()
    {
        return $this->hasMany(Images_local_commercial::class);
    }
}
