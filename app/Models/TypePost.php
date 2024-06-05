<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePost extends Model
{
    use HasFactory;
    protected $table = 'type_posts';

    protected $fillable = [
        "name"
    ];
}
