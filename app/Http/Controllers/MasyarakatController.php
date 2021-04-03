<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use DB;
use Auth;

class MasyarakatController extends Controller
{
    public function dashboard(){
        return view('masyarakat.dashboard');
    }


    public function listPengaduan()
    {
        $nik = Auth::guard('masyarakat')->user()->nik;
        $pengaduan = Pengaduan::where('nik', $nik)->get();
        return view("masyarakat.pengaduan", compact("pengaduan"));
    }

}
