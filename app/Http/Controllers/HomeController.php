<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Lokasi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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

        $countBarang    = Barang::all()->count();
        $countLokasi    = Lokasi::all()->count();
        $countKategori  = Kategori::all()->count();
        $countUsers     = User::all()->count();
        return view('/home', [
            'users'     => Auth::user(),
            'chart'         => $chart,
            'countBarang'   => $countBarang,
            'countLokasi'   => $countLokasi,
            'countKategori' => $countKategori,
            'countUsers'    => $countUsers,
        ]);
    }
}
