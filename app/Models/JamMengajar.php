<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JamMengajar extends Model
{

    use HasFactory;
    protected $table = 'jam_mengajar';
    protected $fillable = ['nuptk', 'jam_mengajar', 'hari_mengajar'];

    //join guru
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'nuptk', 'nuptk');
    }
}
