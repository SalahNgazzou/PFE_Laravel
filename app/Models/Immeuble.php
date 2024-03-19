<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immeuble extends Model
{
    use HasFactory;

    protected $table = 'immeuble';

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
        'nbr_appartement',
        'nbr_etage',
       'année_construction',
      'superficie_total',
      'superficie_appartement',
       'type_immeuble',
       'espace_commun',
       'id_user',
       'user_name',
       'user_lastName',
       'user_email',
       'user_phone',
       'propritair_name',
       'proritaire_phone',
    ];

    public function images_immeuble()
    {
        return $this->hasMany(Images_immeuble::class);
    }
}
