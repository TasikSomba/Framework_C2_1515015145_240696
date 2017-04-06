<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ruangan;

class ruanganController extends Controller
{
    public function awal()
	{
		/*return "Hello dari ruanganController";*/
		return view('ruangan.awal',['data'=>ruangan::all()]);
	}
	public function tambah()
	{
		/*return $this->simpan();*/
		return view('ruangan.tambah');
	}
	public function simpan(Request $input)
	{
		$ruangan = new ruangan();
		$ruangan->title = $input->title;
		$ruangan->save();
		$informasi = $ruangan->save()? 'Berhasil simpan data' : 'gagal simpan data';
		return redirect('ruangan')->with(['informasi'=>$informasi]);
		/*return "data dengan title [$ruangan->title] telah disimpan";*/
	}
	public function edit($id)
	{
		$ruangan = ruangan::find($id);
		return view('ruangan.edit')->with(array('ruangan'=>$ruangan));
	}
	public function lihat($id)
	{
		$ruangan = ruangan::find($id);
		return view('ruangan.lihat')->with(array('ruangan'=>$ruangan));
	}
	public function update($id,Request $input)
	{
		$ruangan = ruangan::find($id);
		$ruangan->title = $input->title;
		$ruangan->save();
		$informasi = $ruangan->save()? 'Berhasil simpan data' : 'gagal simpan data';
		return redirect('ruangan')->with(['informasi'=>$informasi]);
	}
	public function hapus($id)
	{
		$ruangan = ruangan::find($id);
		$informasi = $ruangan->delete() ? 'Berhasil hapus data' : 'gagal hapus data';
		return redirect('ruangan')->with(['informasi'=>$informasi]);
	}
}
