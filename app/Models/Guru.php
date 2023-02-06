<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';
    protected $fillable = ['nama', 'nuptk', 'tingkatan_id'];

    public function tingkatan()
    {
        return $this->belongsTo(Tingkatan::class, 'tingkatan_id');
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
