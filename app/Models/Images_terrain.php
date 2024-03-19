<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images_terrain extends Model
{
    use HasFactory;

    protected $table = 'images_terrain';

    protected $primaryKey = 'id';
    protected $fillable = [
        'id_bien',
        'src',
    ];

    public function terrain()
    {
        return $this->belongsTo(Terrain::class);
    }
}
