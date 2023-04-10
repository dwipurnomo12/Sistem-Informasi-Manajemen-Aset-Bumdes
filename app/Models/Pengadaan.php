<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class)->withDefault([
            'nama_lokasi' => 'Tanpa Lokasi'
        ]);
    }

    public function Statuspengadaan()
    {
        return $this->hasMany(Statuspengadaan::class);
    }

}
