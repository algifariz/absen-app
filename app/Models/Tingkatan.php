<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tingkatan extends Model
{
    use HasFactory;

    protected $table = 'tingkatan_honorer';
    protected $fillable = ['nama'];

    public function guru()
    {
        return $this->hasMany(Guru::class, 'tingkatan_id');
    }

    public function tunjangan()
    {
        return $this->belongsTo(Tunjangan::class, 'tingkatan_id');
    }
}
