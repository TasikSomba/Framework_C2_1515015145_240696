<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\matakuliah;

class matakuliahController extends Controller
{
     public function awal()
	{
		/*return "Hello dari matakuliahController";*/
		return view('matakuliah.awal',['data'=>matakuliah::all()]);
	}
	public function tambah()
	{
		/*return $this->simpan();*/
		return view('matakuliah.tambah');
	}
	public function simpan(Request $input)
	{
		$matakuliah = new matakuliah();
		$matakuliah->title = $input->title;
		$matakuliah->keterangan = $input->keterangan;
		$informasi = $matakuliah->save()? 'Berhasil simpan data' : 'gagal simpan data';
		return redirect('matakuliah')->with(['informasi'=>$informasi]);
	}
	public function edit($id)
	{
		$matakuliah = matakuliah::find($id);
		return view('matakuliah.edit')->with(array('matakuliah'=>$matakuliah));
	}
	public function lihat($id)
	{
		$matakuliah = matakuliah::find($id);
		return view('matakuliah.lihat')->with(array('matakuliah'=>$matakuliah));
	}
	public function update($id,Request $input)
	{
		$matakuliah = matakuliah::find($id);
		$matakuliah->title = $input->title;
		$matakuliah->keterangan = $input->keterangan;
		$informasi = $matakuliah->save()? 'Berhasil simpan data' : 'gagal simpan data';
		return redirect('matakuliah')->with(['informasi'=>$informasi]);
	}
	public function hapus($id)
	{
		$matakuliah = matakuliah::find($id);
		$informasi = $matakuliah->hapus()? 'Berhasil hapus data' : 'gagal hapus data';
		return redirect('matakuliah')->with(['informasi'=>$informasi]);
	}
}
