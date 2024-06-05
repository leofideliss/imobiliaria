<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaracteristicasCondominio extends Model
{
    use HasFactory;
    protected $table = "caracteristicas_condominios";
    
    protected $fillable = [
        'name'
    ];
}
