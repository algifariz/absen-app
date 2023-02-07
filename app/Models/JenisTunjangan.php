<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTunjangan extends Model
{
    use HasFactory;

    protected $table = 'jenis_tunjangan';

    protected $fillable = [
        'jenis_tunjangan',
        'besar_tunjangan',
    ];
}
