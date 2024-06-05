<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid as RamseyUuid;

class CondominioCaracteristicas extends Model
{
    use HasFactory;
    protected $table = "codominio_caracteristicas";
    protected $keyType = 'string';


    protected $fillable = [
        'condominio_id',
        'caracteristicas_condominio_id',
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
