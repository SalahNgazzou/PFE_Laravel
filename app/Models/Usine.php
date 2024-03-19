<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usine extends Model
{
    use HasFactory;

    protected $table = 'usine';

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
       'superficie_total',
       'superficie_batie',
       'superficie_terre',
       'type_industrie',
       'equipement',
       'acces_tansport',
       'id_user',
       'user_name',
       'user_lastName',
       'user_email',
       'user_phone',
       'propritair_name',
       'proritaire_phone',

    ];

    public function images_usine()
    {
        return $this->hasMany(Images_usine::class);
    }
}
