<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'phone',
        'adresse',
        'message',
        'etat',
    ];
}
