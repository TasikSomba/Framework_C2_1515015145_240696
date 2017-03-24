<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\dosenmatakuliah;

class dosenmatakuliahController extends Controller
{
   public function awal()
	{
		return view('dosenmatakuliah.awal',['data'=>dosenmatakuliah::all()]);
	}
	public function tambah()
	{
		return view('dosenmatakuliah.tambah');
	}
	public function simpan(Request $input)
	{
		$dosenmatakuliah = new dosenmatakuliah();
		$dosenmatakuliah->nama = $input ;
		$dosenmatakuliah->nip = $input;
		$dosenmatakuliah->alamat = $input;
		$dosenmatakuliah->pengguna_id = $input;	
		$dosenmatakuliah = save() ? 'Berhasil simpan data' : 'gagal simpan data';
		return redirect('dosenmatakuliah')->with(['informasi'=>$informasi]);
	}
	public function edit($id)
	{
		$dosenmatakuliah = dosenmatakuliah::find($id);
		return view('dosenmatakuliah.edit')->with(array('dosenmatakuliah'=>$dosenmatakuliah));
	}
	public function lihat($id)
	{
		$dosenmatakuliah = dosenmatakuliah::find($id);
		return view('dosenmatakuliah.lihat')->with(array('dosenmatakuliah'=>$dosenmatakuliah));
	}
	public function update($id, Request $input)
	{
		$dosenmatakuliah = new dosenmatakuliah();
		$dosenmatakuliah->nama = $input ;
		$dosenmatakuliah->nip = $input;
		$dosenmatakuliah->alamat = $input;
		$dosenmatakuliah->pengguna_id = $input;	
		$dosenmatakuliah = save() ? 'Berhasil Update data' : 'gagal Update data';
		return redirect('dosenmatakuliah')->with(['informasi'=>$informasi]);
	}
	public function hapus($id)
	{
		$dosenmatakuliah = dosenmatakuliah::find($id);
		$informasi = $dosenmatakuliah->save()	? 'Berhasil hapus data' : 'gagal hapus data';
		return redirect('dosenmatakuliah')->with(['informasi'=>$informasi]);
	}
}
