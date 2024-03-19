<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images_appartement extends Model
{
    use HasFactory;

    protected $table = 'images_appartement';

    protected $primaryKey = 'id';
    protected $fillable = [
        'id_bien',
        'src',
    ];

    public function appartement()
    {
        return $this->belongsTo(Appartement::class);
    }
}
