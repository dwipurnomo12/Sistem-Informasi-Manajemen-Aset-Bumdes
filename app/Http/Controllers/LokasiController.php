<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('lokasi.index', [
            'users'     => Auth::user(),
            'lokasis'   => Lokasi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lokasi.create', [
            'users' => Auth::user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lokasi'      => 'required',
            'deskripsi' => 'required'
        ]);

        $validated['user_id'] = auth()->user()->id;

        Lokasi::create($validated);
        Alert::success('Berhasil', 'Berhasil Menambahkan Lokasi !');
        return redirect('/lokasi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lokasi $lokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lokasi $lokasi)
    {
        return view('lokasi.edit', [
            'users'  => Auth::user(),
            'lokasi' => $lokasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lokasi $lokasi)
    {
        $rules = [
            'nama_lokasi'   => 'required',
            'deskripsi'     => 'required',
        ];

        $validated = $request->validate($rules);

        $validated['user_id'] = auth()->user()->id;

        Lokasi::where('id', $lokasi->id)
            ->update($validated);
        
        Alert::success('Berhasil !', 'Berhasil Mengedit Lokasi');
        return redirect('/lokasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lokasi $lokasi)
    {
        Lokasi::destroy($lokasi->id);
        Alert::success('Berhasil', 'Berhasil Menghapus Lokasi');
        return redirect('/lokasi');
    }
}
