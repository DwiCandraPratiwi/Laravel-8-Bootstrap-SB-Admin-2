<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; //tambahkan ini ya jngn lupa

class Masyarakat extends Authenticatable //ini juga yaa.. model nya ubah ke autenticabasudsa
{
    use HasFactory;

    protected $table = 'Masyarakat';
    protected $primaryKey = 'nik';
    protected $fillable = ['nik', 'nama', 'username', 'password', 'telp'];
    public $timestamps = false;
    protected $guards = 'masyarakat';

    public function pengaduan(){
        return $this->hasMany(Pengaduan::class, 'nik');
    }
}
