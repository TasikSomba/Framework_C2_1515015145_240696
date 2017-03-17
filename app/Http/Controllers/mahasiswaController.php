<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\mahasiswa;

class mahasiswaController extends Controller
{
    public function awal()
{
	return "Hello dari mahasiswaController";
}

public function tambah()
{
	return $this->simpan();
}

public function simpan()
{
	$mahasiswa = new mahasiswa();
	$mahasiswa->nama = 'Tasik Somba';
	$mahasiswa->nim = '1515015145';
	$mahasiswa->alamat = 'Loa Janan ilir';
	$mahasiswa->pengguna_id = 001;
	$mahasiswa->save();
	return "data dengan nama {$mahasiswa->nama} telah disimpan";
}
}
