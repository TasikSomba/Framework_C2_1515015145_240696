<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\dosen;

class dosenController extends Controller
{
     public function awal()
{
	return "Hello dari dosenController";
}

public function tambah()
{
	return $this->simpan();
}

public function simpan()
{
	$dosen = new dosen();
	$dosen->nama = 'Masnah';
	$dosen->nip = '09090912';
	$dosen->alamat = 'Sungai Dama';
	$dosen->pengguna_id = '1';
	$dosen->save();
	return "Data dengan nama {$dosen->nama} telah disimpan";
}
}
