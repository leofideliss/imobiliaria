<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid as RamseyUuid;

class Condominio extends Model
{
    use HasFactory;
    protected $table = "condominios";
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'url_video' , 
        'CEP' , 
        'complement' , 
        'district' ,
        'number' , 
        'state' , 
        'street' ,
        'title' ,
        'city_id' ,
        'user_code' ,
        'condominio_code'
    ];

    protected static function booted()
    {
        static::creating(
            function ($model) {
                $model->id = RamseyUuid::uuid4()->toString();
            }
        );
    }

    
    public function getCaracteristicas()
    {
        return $this->belongsToMany(CaracteristicasCondominio::class, 'codominio_caracteristicas');
    }
}
