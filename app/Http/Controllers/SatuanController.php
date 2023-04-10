<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('satuan.index', [
            'users'     => Auth::user(),
            'satuans'   => Satuan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('satuan.create', [
            'users' => Auth::user(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required',
            'deskripsi' => 'required'
        ]);

        $validated['user_id'] = auth()->user()->id;

        Satuan::create($validated);
        Alert::success('Berhasil', 'Berhasil Menambahkan Jenis Satuan Baru !');
        return redirect('/satuan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Satuan $satuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Satuan $satuan)
    {
        return view('satuan.edit', [
            'users'  => Auth::user(),
            'satuan' => $satuan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Satuan $satuan)
    {
        $rules = [
            'nama'      => 'required',
            'deskripsi' => 'required',
        ];

        $validated = $request->validate($rules);

        $validated['user_id'] = auth()->user()->id;

        Satuan::where('id', $satuan->id)
            ->update($validated);
        
        Alert::success('Berhasil !', 'Berhasil Mengedit Satuan');
        return redirect('/satuan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Satuan $satuan)
    {
        //
    }
}
