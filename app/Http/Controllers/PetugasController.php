<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; //isi inget
use App\Models\Petugas; //use model

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homeAdmin()
    {
        return view('admin.homeAdmin');
    }

    public function homePetugas()
    {
        return view('petugas.home');
    }

    public function laporanView()
    {
        return view('admin.laporan');
    }

    public function index(){
        $petugas = DB::select("call listpetugas");
        return view("admin.petugas", compact("petugas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.petugasCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $petugas = Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => $request->password,
            'telp' => $request->telp,
            'level' => $request->level
    ]);
        return redirect('/admin/petugas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $petugas = DB::select('call editPetugas(?)', array($id));
        return view('admin.petugasEdit', compact('petugas'));
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
        $petugas = Petugas::find($id);
        $petugas->nama_petugas = $request->nama_petugas;
        $petugas->username = $request->username;
        $petugas->password = $request->password;
        $petugas->telp = $request->telp;
        $petugas->level = $request->level; 
        $petugas->save();

        return redirect('/admin/petugas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petugas = Petugas::find($id);
        $petugas->delete();

        return redirect('/admin/petugas');
    }
}
