<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use DB;
use Auth;
use Storage;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function listPengaduanAdmin()
    {
        $pengaduan = DB::select("call listpengaduan");
        return view("admin.pengaduan", compact("pengaduan"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nik = Auth::guard('masyarakat')->user()->nik;
        $tgl_pengaduan = date('Y-m-d');
        return view("masyarakat.pengaduanCreate", compact('nik', 'tgl_pengaduan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nik = Auth::guard('masyarakat')->user()->nik;
        $tgl_pengaduan = date('Y-m-d');
        if($request->hasfile('foto'))
        {
            $foto = $request->file('foto');
            $disk = Storage::disk('public_path')->put('', $foto);
            $url = '/foto/' . $disk;
        }
        $pengaduan = Pengaduan::create([
            'nik' => $nik,
            'tgl_pengaduan' => $tgl_pengaduan,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $url,
            'status' => '0'
    ]);
        return redirect()->route('masyarakat.listPengaduan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::find($id);
        return view('masyarakat.pengaduanDetail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
