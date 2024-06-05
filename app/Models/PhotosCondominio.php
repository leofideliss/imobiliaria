<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotosCondominio extends Model
{
    use HasFactory;
    protected $table = "photos_condominios";
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'pathname',
        'condominio_id'
    ];
}
