<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proprietarios extends Model
{
    use HasFactory;
    protected $table = "proprietarios";
    protected $fillable = [
        'nome', 'telefone', 'email','user_code'
    ];
}
