<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimations extends Model
{
    use HasFactory;

     protected $table = 'estimation_biens';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'type',
        'categorie',
        'adresse',
        'message',
        'etat',
    ];
}
