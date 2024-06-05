<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configurations extends Model
{
    use HasFactory;
    protected $table = "configurations";
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'whatsapp',
        'phone',
        'email',
        'indicate_com',
        'photo_com',
        'eval_com',
        'realtor_com',
        'facebook',
        'instagram',
        'link_vender',
        'link_indicar',
        'link_corretores',
        'link_fotografos',
        'link_avaliadores',
        'img_name',
        'image_path',
        'descricao',
        'website_access'
    ];
}
