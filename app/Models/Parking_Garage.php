<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking_Garage extends Model
{
    use HasFactory;

    protected $table = 'parking\garage';

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
        'nbr_place',
        'dimension',
        'secuirité',
        'accessibilité',
        'service',
        'id_user',
        'user_name',
        'user_lastName',
        'user_email',
        'user_phone',
        'propritair_name',
        'proritaire_phone',
    ];

    public function images_parking_garage()
    {
        return $this->hasMany(images_parking_garage::class);
    }
}
