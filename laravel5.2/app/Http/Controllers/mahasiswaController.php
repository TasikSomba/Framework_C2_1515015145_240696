<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\mahasiswa;
use App\pengguna;
use App\Http\Requests\MahasiswaRequest;

class mahasiswaController extends Controller
{
	protected $informasi = 'Gagal Melakukan Aksi';
     public function awal()
	{
		$semuamahasiswa = mahasiswa::all();
		/*return "Hello dari mahasiswaController";*/
		return view('mahasiswa.awal', ['semuamahasiswa'=>mahasiswa::all()]); /*compact($semuamahasiswa));*/
	}
	public function tambah()
	{
		/*return $this->simpan();*/
		return view('mahasiswa.tambah');
	}
	public function simpan(MahasiswaRequest $input)
	{
		$pengguna = new pengguna($input->only('username','password'));
		if ($pengguna->save()){
			$mahasiswa = new mahasiswa();
			$mahasiswa->nama = $input->nama;
			$mahasiswa->nim = $input->nim;
			$mahasiswa->alamat = $input->alamat;
			if ($pengguna->mahasiswa()->save($mahasiswa)) $this->informasi = 'Berhasil simpan data';
		}
		
		return redirect('mahasiswa')->with(['informasi' => $this->informasi]);
	}

	public function edit($id)
	{
		$mahasiswa = mahasiswa::find($id);
		return view('mahasiswa.edit')->with(array('mahasiswa'=>$mahasiswa));
	}
	public function lihat($id)
	{
		$mahasiswa = mahasiswa::find($id);
		return view('mahasiswa.lihat')->with(array('mahasiswa'=>$mahasiswa));
	}
	public function update($id, MahasiswaRequest $input)
	{
		$mahasiswa = mahasiswa::find($id);
		$mahasiswa->nama = $input->nama;
		$mahasiswa->nim = $input->nim;
		$mahasiswa->alamat = $input->alamat;
		if (!is_null($input->username)){
			$pengguna = $mahasiswa->pengguna->fill($input->only('username'));
			if(!empty($input->password)) $pengguna->password = $input->password;
			if($pengguna->save()) $this->informasi = 'Berhasil Simpan Data';
		} else{
			$this->informasi = 'Berhasil Ubah Data';
		}
		return redirect('mahasiswa')->with(['informasi' => $this->informasi]);
	}
	public function hapus($id)
	{
		$mahasiswa = mahasiswa::find($id);
		if ($mahasiswa->pengguna()->delete()){
			if ($mahasiswa->delete()) $this->informasi = 'Berhasil Hapus Data';
		}

		return redirect('mahasiswa')->with(['informasi'=> $this->informasi]);
	}
}
