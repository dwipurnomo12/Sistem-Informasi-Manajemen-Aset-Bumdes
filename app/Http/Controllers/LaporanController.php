<?php

namespace App\Http\Controllers;

use DataTables;
use Dompdf\Dompdf;
use App\Models\Barang;
use App\Models\Lokasi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {           
        $userLogin = auth()->user()->roles;
        $mulai = $request->input('tgl_mulai');
        $selesai = $request->input('tgl_selesai');


        if($userLogin == 'kepalausaha'){
            $userId = auth()->user()->id;

            $laporans = Barang::where('user_id', $userId)
                ->when($mulai && $selesai, function ($query) use ($mulai, $selesai) {
                    return $query->whereBetween('tanggal', [$mulai, $selesai]);
                })
                ->orderBy('id', 'asc')
                ->get();
        } else {
            $laporans = Barang::when($mulai && $selesai, function ($query) use ($mulai, $selesai) {
                return $query->whereBetween('tanggal', [$mulai, $selesai]);
            })
                ->orderBy('tanggal')
                ->get();
        } 

        if(!$mulai && !$selesai){
            if($userLogin == 'kepalausaha'){
                $laporans = Barang::where('user_id', auth()->user()->id)->get();
            } else {
                $laporans = Barang::all();
            }
        }
 
        return view('laporan.index', [
            'users'     => Auth::user(),
            'laporans'  => $laporans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        //
    }


    public function cetak(Request $request)
    {
        $userLogin = auth()->user()->roles;
        $userId = auth()->user()->id;
        $mulai = $request->input('tgl_mulai');
        $selesai = $request->input('tgl_selesai');

        if($userLogin === 'kepalausaha'){
            $userId = auth()->user()->id;

            $laporans = Barang::where('user_id', $userId)
                ->when($mulai && $selesai, function ($query) use ($mulai, $selesai) {
                    return $query->whereBetween('tanggal', [$mulai, $selesai]);
                })
                ->orderBy('id', 'asc')
                ->get();
            // dd($laporans);
        } else {
            $laporans = Barang::when($mulai && $selesai, function ($query) use ($mulai, $selesai) {
                return $query->whereBetween('tanggal', [$mulai, $selesai]);
            })
                ->orderBy('tanggal')
                ->get();
        } 


        $logoInstansiPath = storage_path('app/public/logo-instansi/logo.png');
        $logoInstansi = base64_encode(file_get_contents($logoInstansiPath));


        // dd($laporans);
        $pdf = new Dompdf();
        $pdf = PDF::loadView('laporan.cetak', ([
            'laporans'      => $laporans,
            'logoInstansi'  => $logoInstansi
        ]));
        return $pdf->stream('laporan.pdf');
    }
    
  
}
