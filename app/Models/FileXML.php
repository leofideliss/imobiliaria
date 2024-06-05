<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileXML extends Model
{
    use HasFactory;
    protected $table = "file_x_m_l_s";
    protected $fillable = [
        'name',
        'url_xml',
        'qtd_imoveis',
        'processed',
        'auto_process',
        'user_id',
        'generated',
        'file_name',
        'padrao'
    ];
}
