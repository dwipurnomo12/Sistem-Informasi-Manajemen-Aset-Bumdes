<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PenghapusanAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userLogin = auth()->user()->roles;

        if($userLogin == 'kepalausaha'){
            $deletedBarangs = Barang::onlyTrashed()->where('user_id', auth()->user()->id)->get();
        }else{
            $deletedBarangs = Barang::onlyTrashed()->get();
        }


        return view('penghapusan-aset.index', [
            'users'          => Auth::user(),
            'deletedBarangs' => $deletedBarangs
        ]);
    }


    public function restore($id)
    {
        $barang = Barang::onlyTrashed()->where('id', $id);
        $barang->restore();
    
        Alert::success('Berhasil', 'Berhasil Mengembalikan Barang');
        return redirect('/penghapusan-aset');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang = Barang::onlyTrashed()->where('id', $id);
        $barang->forceDelete();

        Alert::success('Berhasil', 'Berhasil Menghapus Permanent Barang');
        return redirect('/penghapusan-aset');
    }
}
