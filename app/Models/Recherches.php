<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recherches extends Model
{
    use HasFactory;

    protected $table = 'recherches';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'last_name',
        'phone',
        'email',
        'type',
        'categorie',
        'gouvernant',
        'ville',
        'etat',
    ];

}
