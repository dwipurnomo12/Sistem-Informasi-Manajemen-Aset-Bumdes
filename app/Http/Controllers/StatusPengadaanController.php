<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Pengadaan;
use Illuminate\Http\Request;
use App\Models\Statuspengadaan;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class StatusPengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('permintaan.index', [
            'users'       => Auth::user(),
            'permintaans' => DB::table('pengadaans')
                                ->leftJoin('statuspengadaans', 'pengadaans.id', '=', 'statuspengadaans.pengadaan_id')
                                ->select('pengadaans.*', 'statuspengadaans.status')
                                ->whereIn('pengadaans.id', function ($query) {
                                    $query->select(DB::raw('MAX(id)'))
                                        ->from('pengadaans')
                                        ->groupBy('nama_pengadaan');
                                })
                                ->orderBy('created_at', 'desc')
                                ->get()
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
    public function store(Request $request,)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('permintaan.show', [
            'users'     => Auth::user(),
            'pengadaan' => Pengadaan::find($id),
            'status'    => Statuspengadaan::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Statuspengadaan $statuspengadaan, $id)
    {
        return view('permintaan.edit', [
            'users'             => Auth::user(),
            'status'            => Statuspengadaan::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Statuspengadaan::where('id', $id)
        ->update([
            'catatan'  => $request->catatan,
            'user_id' => Auth::id()
        ]);
        Alert::success('Berhasil !', 'Berhasil Mengirim Catatan');
        return redirect('/permintaan');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Statuspengadaan $statuspengadaan)
    {
        //
    }

    public function setPersetujuan($id)
    {
        Statuspengadaan::where('id', $id)
            ->update([
                'status'  => 'disetujui',
                'user_id' => Auth::id()
            ]);
        Alert::success('Berhasil', 'Pengadaan Barang Disetujui');
        return redirect()->back()->with('success', 'Persetujuan berhasil disimpan.');
    }

    public function setPenolakan($id)
    { 
        Statuspengadaan::where('id', $id)
            ->update([
                'status' => 'ditolak',
                'user_id' => Auth::id()
            ]);
        Alert::success('Berhasil', 'Pengadaan Barang Ditolak');
        return redirect()->back()->with('success', 'Penolakan berhasil disimpan.');
    }

    public function cetakPengadaanBarang($id)
    {
        $logoInstansiPath = storage_path('app/public/logo-instansi/logo.png');
        $logoInstansi = base64_encode(file_get_contents($logoInstansiPath));

        $pdf = new Dompdf();
        $pdf = PDF::loadView('permintaan.laporan-pengadaan', [
            'pengadaan'         => Pengadaan::find($id),
            'status'            => Statuspengadaan::find($id),
            'logoInstansi'      => $logoInstansi,
        ]);

        return $pdf->download('laporan-pengadaan.pdf');
    }
}
