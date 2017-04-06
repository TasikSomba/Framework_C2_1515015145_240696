<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\jadwalmatakuliah;
use App\mahasiswa;
use App\dosenmatakuliah;
use App\ruangan;

class jadwalmatakuliahController extends Controller
{
	protected $guarded = ['id'];
	protected $informasi = 'Gagal Melakukan Aksi';
    public function awal()
	{
		$semuajadwalmatakuliah = jadwalmatakuliah::all();
		return view('jadwalmatakuliah.awal',['semuajadwalmatakuliah'=>jadwalmatakuliah::all()]); /*compact('semuajadwalkuliah'));*/
			/*['semuajadwalkuliah'=>jadwalmatakuliah::all()]);*/
		/*return "Hello dari jadwalmatakuliahController";*/
	}
	public function tambah()
	{
		$mahasiswa = new mahasiswa;
		$ruangan = new ruangan;
		$dosenmatakuliah = new dosenmatakuliah;
		return view('jadwalmatakuliah.tambah', compact('mahasiswa','ruangan','dosenmatakuliah'));
	/*	return view('jadwalmatakuliah.tambah');*/
	/*	return $this->simpan();*/
	}
	public function simpan(Request $input)
	{
		$jadwalmatakuliah = new jadwalmatakuliah($input->only('ruangan_id','dosenmatakuliah_id','mahasiswa_id'));
		if ($jadwalmatakuliah->save()) $this->informasi = 'Jadwal Mahasiswa Berhasil Di Simpan';

		return redirect('jadwalmatakuliah')->with(['informasi' => $this->informasi]);
	}

	public function edit($id)
	{
		$jadwalmatakuliah = jadwalmatakuliah::find($id);
		$mahasiswa= new mahasiswa;
		$ruangan = new ruangan;
		$dosenmatakuliah = new dosenmatakuliah;
		return view('jadwalmatakuliah.edit', compact('mahasiswa','ruangan','dosenmatakuliah','jadwalmatakuliah'));
	}
	public function lihat($id)
	{
		$jadwalmatakuliah = jadwalmatakuliah::find($id);
		return view('jadwalmatakuliah.lihat')->with(array('jadwalmatakuliah'=>$jadwalmatakuliah));
	}
	public function update($id, Request $input)
	{
		$jadwalmatakuliah = jadwalmatakuliah::find($id);
		$jadwalmatakuliah->fill($input->only('ruangan_id', 'dosenmatakuliah_id','mahasiswa_id'));		
		if ($jadwalmatakuliah->save()) $this->informasi = "Jadwal Mahasiswa Berhasil di perbaharui";
		return redirect('jadwalmatakuliah')->with(['informasi' =>$this->informasi]);
	}
	public function hapus($id)
	{
		$jadwalmatakuliah = jadwalmatakuliah::find($id);	
		if ($jadwalmatakuliah->delete()) $this->informasi = "Jadwal Mahasiswa Berhasil di Hapus";
		return redirect('jadwalmatakuliah')->with(['informasi' =>$this->informasi]);
}
}