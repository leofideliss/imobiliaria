<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoProperty extends Model
{
    use HasFactory;
    protected $table = "video_properties";

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'pathname',
        'property_id'
    ];
}
