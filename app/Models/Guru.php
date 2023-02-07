<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';
    protected $fillable = ['nama', 'nuptk', 'tunjangan_id', 'jabatan_id', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'agama', 'no_hp'];

    public function jenis_tunjangan()
    {
        return $this->belongsTo(JenisTunjangan::class, 'tunjangan_id');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'nuptk', 'nuptk');
    }

    public function jam_mengajar()
    {
        return $this->hasMany(JamMengajar::class, 'nuptk', 'nuptk');
    }
}
