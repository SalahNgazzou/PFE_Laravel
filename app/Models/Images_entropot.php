<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images_entropot extends Model
{
    use HasFactory;

    protected $table = 'images_entropot';

    protected $primaryKey = 'id';
    protected $fillable = [
        'id_bien',
        'src',
    ];

    public function entropot()
    {
        return $this->belongsTo(Entropot::class);
    }
}
