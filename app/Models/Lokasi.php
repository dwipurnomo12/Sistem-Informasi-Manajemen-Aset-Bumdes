<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }

    public function pengadaans()
    {
        return $this->hasMany(Pengadaan::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
