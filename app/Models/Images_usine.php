<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images_usine extends Model
{
    use HasFactory;

    protected $table = 'images_usine';

    protected $primaryKey = 'id';
    protected $fillable = [
        'id_bien',
        'src',
    ];

    public function usine()
    {
        return $this->belongsTo(Usine::class);
    }
}
