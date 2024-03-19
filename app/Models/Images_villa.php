<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images_villa extends Model
{
    use HasFactory;

    protected $table = 'images_villa';

    protected $primaryKey = 'id';
    protected $fillable = [
        'id_bien',
        'src',
    ];

    public function villa()
    {
        return $this->belongsTo(Villa::class);
    }
}
