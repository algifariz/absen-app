<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'jabatan';

    protected $fillable = [
        'nama_jabatan',
        'besar_tunjangan',
    ];

    public function guru()
    {
        return $this->hasMany(Guru::class, 'jabatan_id');
    }
}
