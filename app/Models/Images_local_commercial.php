<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images_local_commercial extends Model
{
    use HasFactory;

    protected $table = 'images_local_commercial';

    protected $primaryKey = 'id';
    protected $fillable = [
        'id_bien',
        'src',
    ];

    public function local_commercial()
    {
        return $this->belongsTo(Local_commercial::class);
    }
}
