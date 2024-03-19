<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class images_parking_garage extends Model
{
    use HasFactory;

    protected $table = 'images_parking';

    protected $primaryKey = 'id';
    protected $fillable = [
        'id_bien',
        'src',
    ];

    public function parking_garage()
    {
        return $this->belongsTo(Parking_Garage::class);
    }
}
