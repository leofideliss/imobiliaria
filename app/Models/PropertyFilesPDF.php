<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyFilesPDF extends Model
{
    use HasFactory;
    protected $table = "property_files_p_d_f_s";
    protected $fillable = [
        'filename',
        'name',
        'public_path',
        'property_id'
    ];
}
