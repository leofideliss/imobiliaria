<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NearbyPlaces extends Model
{
    use HasFactory;
    protected $table = "nearby_places";
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'dist',
        'property_id',
        'name',
        'place_id',
        'vicinity',
        'lat',
        'lng',
        'type'
    ];
}
