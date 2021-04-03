<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Masyarakat;
use App\Models\Petugas;
use Auth;

class AuthController extends Controller
{
    public function registerView(){
        return view('auth.register');
    }

    public function LoginView(){
        return view('auth.login');
    }

    public function registerProses(Request $request){
        Masyarakat::create([
            'nik'=>$request->nik,
            'nama'=>$request->nama,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
            'telp'=>$request->telp
        ]);
        return redirect('/login');
    }

    public function loginProses(Request $request){
        $login = $request->only(['username', 'password']);

        $petugas = Petugas::where([
            'username' => $request->username,
            'password' => $request->password
        ])->first();

        if(Auth::guard('masyarakat')->attempt($login)){
            return redirect('/masyarakat');
        }elseif($petugas){
            Auth::guard('petugas')->login($petugas);
            $level = Auth::guard('petugas')->user()->level;
            if($level == 'petugas'){
                return redirect('/petugas');
            }else{
                return redirect('/admin');
            }
        } else{
            return redirect('login');
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
