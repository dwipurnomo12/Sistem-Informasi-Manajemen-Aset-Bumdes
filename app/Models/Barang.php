<?php

namespace App\Models;

use App\Models\User;
use App\Models\Lokasi;
use App\Models\Satuan;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['kode_barang', 'gambar', 'nama', 'deskripsi', 'tanggal', 'harga', 'user_id', 'kategori_id', 'lokasi_id', 'satuan_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class)->withDefault([
            'nama' => 'Tanpa Kategori'
        ]);
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class)->withDefault([
            'nama_lokasi' => 'Tanpa Lokasi'
        ]);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class)->withDefault([
            'nama' => 'Tanpa Satuan'
        ]);
    }


}
