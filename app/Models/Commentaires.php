<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaires extends Model
{
    use HasFactory;

    protected $table = 'commentairs';

   

    protected $primaryKey = 'id';
    protected $fillable = [
        'id_bien',
        'nom_prenom',
        'email',
        'telephone',
        'id_user',
        'etat',
        'message',
       
    ];

}
