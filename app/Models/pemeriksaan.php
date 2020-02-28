<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pemeriksaan extends Model
{
    protected $table = 'pemeriksaan';
    protected $primaryKey = 'id_pemeriksaan';
    // Storing arrays in base
    protected $casts = [
        'tindakan' => 'array',
    ];
}
