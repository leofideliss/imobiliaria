<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileXMLProperties extends Model
{
    use HasFactory;
    protected $table= "file_x_m_l_properties";
    protected $fillable=['file_id','prop_code','publication_type'];
}
