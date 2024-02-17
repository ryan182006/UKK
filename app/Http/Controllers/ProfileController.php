<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function index(){
        $jum_barang = Keranjang::where('user_id', auth()->user()->id)->count();
        return view('ViewProfile',[
            'jumlah' => $jum_barang
        ]
    );
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Menambahkan aturan validasi untuk foto
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8',
        ]);

        $user = Auth::user();

        // Update informasi profil
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            // Update informasi lainnya sesuai kebutuhan
        ]);

        // Update foto profil jika ada
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photo');
            $user->update(['photo' => $photoPath]);
        }
        

        // Memeriksa apakah kata sandi saat ini sesuai dengan yang dimasukkan pengguna
        if (Hash::check($request->currentPassword, $user->password)) {
            // Mengupdate kata sandi baru
            $user->update([
                'password' => bcrypt($request->newPassword),
            ]);

            return back()->with('berhasil', 'Password Berhasil di ubah');
        } else {
            return back()->with('error', 'Konfirmasi Password tidak sama');
        }
    }
}
