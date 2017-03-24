<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\jadwalmatakuliah;

class jadwalmatakuliahController extends Controller
{
    public function awal()
	{
		return view('jadwalmatakuliah.awal',['data'=>jadwalmatakuliah::all()]);
		/*return "Hello dari jadwalmatakuliahController";*/
	}
	public function tambah()
	{
		return view('jadwalmatakuliah.tambah');
	/*	return $this->simpan();*/
	}
	public function simpan(Request $input)
	{
		$jadwalmatakuliah = new jadwalmatakuliah();
		$jadwalmatakuliah->mahasiswa_id = $input->mahasiswa_id;
		$jadwalmatakuliah->ruangan_id = $input->ruangan_id;
		$jadwalmatakuliah->dosenmatakuliah_id = $input->dosenmatakuliah_id;
		$jadwalmatakuliah = save() ? 'Berhasil simpan data' : 'gagal simpan data';
		return redirect('jadwalmatakuliah')->with(['informasi'=>$informasi]);
	}

	public function edit($id)
	{
		$jadwalmatakuliah = jadwalmatakuliah::find($id);
		return view('jadwalmatakuliah.edit')->with(array('jadwalmatakuliah'=>$jadwalmatakuliah));
	}
	public function lihat($id)
	{
		$jadwalmatakuliah = jadwalmatakuliah::find($id);
		return view('jadwalmatakuliah.lihat')->with(array('jadwalmatakuliah'=>$jadwalmatakuliah));
	}
	public function update($id, Request $input)
	{
		$jadwalmatakuliah = new jadwalmatakuliah();
		$jadwalmatakuliah->mahasiswa_id = $input->mahasiswa_id;
		$jadwalmatakuliah->ruangan_id = $input->ruangan_id;
		$jadwalmatakuliah->dosenmatakuliah_id = $input->dosenmatakuliah_id;
		$jadwalmatakuliah = save() ? 'Berhasil update data' : 'gagal update data';
		return redirect('jadwalmatakuliah')->with(['informasi'=>$informasi]);
	}
	public function hapus($id)
	{
		$jadwalmatakuliah = jadwalmatakuliah::find($id);
		$jadwalmatakuliah = save() ? 'Berhasil hapus data' : 'gagal hapus data';
		return redirect('jadwalmatakuliah')->with(['informasi'=>$informasi]);
}
}