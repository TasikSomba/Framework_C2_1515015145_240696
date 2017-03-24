<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\dosen;

class dosenController extends Controller
{
     public function awal()
	{
		return view('dosen.awal',['data'=>dosen::all()]);
	}
	public function tambah()
	{
		return view('dosen.tambah');
	}
	public function simpan(Request $input)
	{
		$dosen = new dosen();
		$dosen->nama = $input ;
		$dosen->nip = $input;
		$dosen->alamat = $input;
		$dosen->pengguna_id = $input;	
		$dosen->save() ? 'Berhasil simpan data' : 'gagal simpan data';
		return redirect('dosen')->with(['informasi'=>$informasi]);
	}
	public function edit($id)
	{
		$dosen = dosen::find($id);
		return view('dosen.edit')->with(array('dosen'=>$dosen));
	}
	public function lihat($id)
	{
		$dosen = dosen::find($id);
		return view('dosen.lihat')->with(array('dosen'=>$dosen));
	}
	public function update($id, Request $input)
	{
		$dosen = new dosen();
		$dosen->nama = $input ;
		$dosen->nip = $input;
		$dosen->alamat = $input;
		$dosen->pengguna_id = $input;	
		$dosen->save() ? 'Berhasil Update data' : 'gagal Update data';
		return redirect('dosen')->with(['informasi'=>$informasi]);
	}
	public function hapus($id)
	{
		$dosen = dosen::find($id);
		$informasi = $dosen->save()	? 'Berhasil hapus data' : 'gagal hapus data';
		return redirect('dosen')->with(['informasi'=>$informasi]);
	}
}
