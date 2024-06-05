<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid as RamseyUuid;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory;
    protected $table = "employees";
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'CPF',
        'name',
        'phone',
        'email',
        'status',
        'password',
        'type',
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
