<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Ramsey\Uuid\Uuid as RamseyUuid;

class Customer extends Authenticatable
{
    use HasFactory;
    protected $table = "customers";
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'CPF',
        'name',
        'phone',
        'email',
        'status',
        'password',
        'data_nasc',
        'terms',
        'remember_token',
        'google_id'
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
