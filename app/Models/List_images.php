<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class List_images extends Model
{
    use HasFactory;

    protected $table = 'list_images';

    protected $primaryKey = 'id';
    protected $fillable = [
        'id_bien',
        'src',
    ];

    public function biens()
    {
        return $this->belongsTo(Biens::class);
    }
}
