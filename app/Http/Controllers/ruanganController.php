<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ruangan;

class ruanganController extends Controller
{
      public function awal()
{
	return "Hello dari ruanganController";
}

public function tambah()
{
	return $this->simpan();
}

public function simpan()
{
	$ruangan = new ruangan();
	$ruangan->title = 'S.Kom';
	$ruangan->save();
	return "Data dengan title {$ruangan->title} telah disimpan";
}
}
