<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Pengadaan;
use Illuminate\Http\Request;
use App\Models\Statuspengadaan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pengadaan.index', [
            'users'      => Auth::user(),
            'pengadaans' => Pengadaan::leftJoinSub(
                                DB::table('statuspengadaans')
                                    ->select('pengadaan_id', DB::raw('MAX(created_at) as latest_created_at'))
                                    ->groupBy('pengadaan_id'),
                                'latest_status',
                                function ($join) {
                                    $join->on('pengadaans.id', '=', 'latest_status.pengadaan_id');
                                }
                            )
                                ->leftJoin('statuspengadaans', function ($join) {
                                    $join->on('latest_status.pengadaan_id', '=', 'statuspengadaans.pengadaan_id')
                                        ->on('latest_status.latest_created_at', '=', 'statuspengadaans.created_at');
                                })
                                ->select('pengadaans.*', 'statuspengadaans.status')
                                ->orderBy('created_at', 'desc')
                                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengadaan.create', [
            'users'   => Auth::user(),
            'lokasis' => Lokasi::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pengadaan'    => 'required',
            'quantity'          => 'required|numeric',
            'deskripsi'         => 'required',
            'lokasi_id'         => 'required',  
        ]);

        $validated['user_id'] = auth()->user()->id;
        $validated['tanggal_pengajuan'] = now();
        $validated['status'] = 'pending';

        $pengadaan = Pengadaan::create($validated);

        $status = new Statuspengadaan;
        $status->status = 'pending';
        $status->pengadaan_id = $pengadaan->id;
        $status->save();
        
        Alert::success('Berhasil', 'Berhasil Mengajukan Pengadaan Barang');
        return redirect('/pengadaan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('pengadaan.show', [
            'users'     => Auth::user(),
            'pengadaan' => Pengadaan::find($id),
            'status'    => Statuspengadaan::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengadaan $pengadaan)
    {
        return view('pengadaan.edit', [
            'users'     => Auth::user(),
            'pengadaan' => $pengadaan,
            'lokasis'   => Lokasi::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengadaan $pengadaan)
    {
        $rules = [
            'nama_pengadaan'    => 'required',
            'quantity'          => 'required|numeric',
            'deskripsi'         => 'required',
            'lokasi_id'         => 'required',
            // 'tanggal_pengajuan' => 'required',
        ];

        // jika tanggal_pengajuan tidak diubah, gunakan nilai yang ada pada pengadaan saat ini
        if ($request->tanggal_pengajuan == $pengadaan->tanggal_pengajuan) {
            $validated['tanggal_pengajuan'] = $pengadaan->tanggal_pengajuan;
        }

        $validated = $request->validate($rules);
        $validated['user_id'] = auth()->user()->id;

    

        $pengadaan->update($validated);

        
        Alert::success('Berhasil !', 'Berhasil Mengedit Pengajuan');
        return redirect('/pengadaan');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengadaan $pengadaan)
    {
        $pengadaan->delete();
        Statuspengadaan::where('pengadaan_id', $pengadaan->id)->delete();

        Alert::success('Berhasil', 'Berhasil Menghapus Pengadaan');
        return redirect('/pengadaan');
    }
}
