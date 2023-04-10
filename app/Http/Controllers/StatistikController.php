<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Lokasi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StatistikController extends Controller
{
    
    public function index()
    {
        $userLogin = auth()->user()->roles;

        if($userLogin == 'kepalausaha'){
            $barang = Barang::selectRaw('YEAR(tanggal) as tahun, COUNT(*) as total')
                        ->where('user_id', auth()->user()->id)
                        ->groupBy('tahun')
                        ->get();
        } else {
            $barang = Barang::selectRaw('YEAR(tanggal) as tahun, COUNT(*) as total')
                        ->groupBy('tahun')
                        ->get();
        }



        $chart = new \stdClass();
        $chart->type    = 'bar';
        $chart->labels  = $barang->pluck('tahun');
        $chart->data    = $barang->pluck('total');

        // Pie Statistik Kategori
        $kategori = Kategori::select('nama', DB::raw('count(*) as total'))
                        ->groupBy('nama')
                        ->get();

        $pieChart = new \stdClass();
        $pieChart->type     = 'pie';
        $pieChart->labels   = $kategori->pluck('nama');
        $pieChart->data     = $kategori->pluck('total');


        // Pie Statistik lokasi
        $lokasi = DB::table('lokasis')
                    ->select('nama_lokasi', DB::raw('(SELECT COUNT(*) FROM barangs WHERE lokasi_id = lokasis.id) as total'))
                    ->get();

        $lokasiChart = new \stdClass();
        $lokasiChart->type      = 'pie';
        $lokasiChart->labels    = $lokasi->pluck('nama_lokasi');
        $lokasiChart->data      = $lokasi->pluck('total');


        // Total Harga Statistik
        if($userLogin == 'kepalausaha'){
            $totalHarga = DB::table('barangs')
                ->selectRaw('YEAR(tanggal) AS tahun, SUM(harga) AS totalHarga')
                ->where('user_id', auth()->user()->id)
                ->groupBy('tahun')
                ->get();
        } else{
            $totalHarga = DB::table('barangs')
                ->selectRaw('YEAR(tanggal) AS tahun, SUM(harga) AS totalHarga')
                ->groupBy('tahun')
                ->get();
        }

        
        $keuanganChart = new \stdClass();
        $keuanganChart->type      = 'pie';
        $keuanganChart->labels    = $totalHarga->pluck('tahun');
        $keuanganChart->data      = $totalHarga->pluck('totalHarga');


        return view('statistik.index', [
            'users'         => Auth::user(),
            'chart'         => $chart ,
            'pieChart'      => $pieChart,
            'kategori'      => $kategori,
            'lokasiChart'   => $lokasiChart,
            'lokasi'        => $lokasi,
            'keuanganChart' => $keuanganChart,

        ]);
    }
}
