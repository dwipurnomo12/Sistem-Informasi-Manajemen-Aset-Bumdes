<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kategori.index', [
            'users'      => Auth::user(),
            'kategories' => Kategori::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create', [
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

        Kategori::create($validated);
        Alert::success('Berhasil', 'Berhasil Menambahkan Kategori !');
        return redirect('/kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', [
            'users' => Auth::user(),
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $rules = [
            'nama'      => 'required',
            'deskripsi' => 'required',
        ];

        $validated = $request->validate($rules);

        $validated['user_id'] = auth()->user()->id;

        kategori::where('id', $kategori->id)
            ->update($validated);
        
        Alert::success('Berhasil !', 'Berhasil Mengedit Kategori');
        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        Kategori::destroy($kategori->id);
        Alert::success('Berhasil', 'Berhasil Menghapus Kategori');
        return redirect('/kategori');
    }
}
