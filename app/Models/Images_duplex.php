<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images_duplex extends Model
{
    use HasFactory;

    protected $table = 'images_duplex';

    protected $primaryKey = 'id';
    protected $fillable = [
        'id_bien',
        'src',
    ];

    public function duplex()
    {
        return $this->belongsTo(Duplex::class);
    }
}
