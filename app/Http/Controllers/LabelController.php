<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LabelController extends Controller
{
    public function index()
    {
        $userLogin = auth()->user()->roles;

        if($userLogin == 'kepalausaha'){
            $barangs = Barang::where('user_id', auth()->user()->id)->get();
        } else {
            $barangs = Barang::all();
        }

        return view('/label.index', [
            'users'     => Auth::user(),
            'lokasis'   => Lokasi::all(),
            'barangs'   => $barangs
        ]);
    }
}
