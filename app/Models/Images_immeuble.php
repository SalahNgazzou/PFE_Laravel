<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images_immeuble extends Model
{
    use HasFactory;

    protected $table = 'images_immeuble';

    protected $primaryKey = 'id';
    protected $fillable = [
        'id_bien',
        'src',
    ];

    public function immeuble()
    {
        return $this->belongsTo(Immeuble::class);
    }
}
