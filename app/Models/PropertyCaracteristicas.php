<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid as RamseyUuid;

class PropertyCaracteristicas extends Model
{
    use HasFactory;
    protected $table = "property_caracteristicas";
    protected $keyType = 'string';


    protected $fillable = [
        'caracteristicas_id',
        'property_id',
    ];

    protected static function booted()
    {
        static::creating(
            function ($model) {
                $model->id = RamseyUuid::uuid4()->toString();
            }
        );
    }
}
