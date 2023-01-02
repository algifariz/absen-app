<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $table = 'presensi';

    protected $fillable = [
        'nuptk',
        'tanggal',
        'jam_masuk',
        'jam_keluar',
        'kehadiran',
        'status',
    ];

    public function guru()
    {
        return $this->hasMany(Guru::class, 'nuptk', 'nuptk');
    }
}
