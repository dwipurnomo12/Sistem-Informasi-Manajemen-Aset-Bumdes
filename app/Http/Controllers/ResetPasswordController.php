<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ResetPasswordController extends Controller
{
    public function index()
    {
        return view('reset-password.index', [
            'users' => Auth::user()
        ]);
    }

    public function resetPassword(Request $request)
    {
        //  Validasi
        $request->validate([
            'current_password'  => 'required',
            'passwordNew'       => 'required|same:konfirmasiPassword'
        ]);

        // Mencocokan Dengan Kata Sandi Lama
        if(!Hash::check($request->current_password, auth()->user()->password)){
            return redirect()->back()->withErrors(['current_password' => 'old password is not the same']);
        }

        // Update Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->passwordNew)
        ]);

        Alert::success('Berhasil', 'Berhasil Mereset Password');
        return redirect('/reset-password');
    }
}
