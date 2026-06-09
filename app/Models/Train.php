<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    use HasFactory;

    protected $casts = [
        'orario_di_partenza' => 'datetime',
        'orario_di_arrivo' => 'datetime',
    ];
}