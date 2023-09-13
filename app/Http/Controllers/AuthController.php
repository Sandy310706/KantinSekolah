<?php

namespace App\Http\Controllers;

use session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
   public function login()
   {
    return view('login');
   }

   public function authtentication(Request $request)
   {
        $credentials = $request -> validate([
            'email' =>  ['required', 'email'],
            'password'  => 'required'
        ],
        [
            'email.required' => 'Email Tidak Boleh Kosong',
            'email.email' => 'Wajib Di Isi',
            'password'  => 'Bingal Si ajg ni',
        ]);
        if(Auth::attempt($credentials)){
            if(Auth::user()->role == 'guest'){
                $request->session()->regenerate();
                return redirect('');
            }elseif(Auth::user()->role == 'admin'){
                $request->session()->regenerate();
                return redirect('dashboard.admin');
            }elseif(Auth::user()->role == 'operator'){
                $request->session()->regenerate();
                return redirect('dashboard.operator');
            }
        }else{
            return back()->with('Gagal', 'Udah Tau Salah Maksa ASU');
        }
   }

   public function register()
   {
        return view('buatakun');
   }

   public function pembuatan(Request $request)
   {
        $validasiData = $request->validate([
            'nama' => ['nama', 'max:100'],
            'email' => ['email', 'unique:dns', 'unique:user'],
            'password' => ['password', 'min:7', 'max:25'],
        ],[
            'nama.required' => ['nama wajib di isi'],
            'email.required' => ['email wajib di isi'],
            'email.email' => ['format email wajib di isi'],
            'password' => ['password wajib di isi'],

        ]);
        Hash::make($validasiData['password']);
        User::create($validasiData);
        return redirect('/login')->with('berhasil', 'udah bise anak jahanam');
   }

   public function logout(Request $request)
   {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
   }

}
