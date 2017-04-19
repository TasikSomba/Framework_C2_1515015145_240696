<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\dosenmatakuliah;
use App\dosen;
use App\matakuliah;
use App\Http\Requests\DosenmatakuliahRequest;

class dosenmatakuliahController extends Controller
{
	protected $guarded = ['id'];
	protected $informasi = 'Gagal Melakukan Aksi';
   public function awal()
	{
		$semuadosenmatakuliah = dosenmatakuliah::all();
		return view('dosenmatakuliah.awal',['semuadosenmatakuliah'=>dosenmatakuliah::all()]);
	}
	public function tambah()
	{
		$dosen = new dosen;
		$matakuliah = new matakuliah;
		return view('dosenmatakuliah.tambah', compact('dosen','matakuliah'));
	}
	public function simpan(DosenmatakuliahRequest $input)
	{
		$dosenmatakuliah = new dosenmatakuliah($input->only('dosen_id','matakuliah_id'));

		if($dosenmatakuliah->save()) $this->informasi = 'Dosen Matakuliah Berhasil Disimpan';

		return redirect('dosenmatakuliah')->with(['informasi' => $this->informasi]);
	}
	
	public function edit($id)
	{

		$dosenmatakuliah = dosenmatakuliah::find($id);
		$dosen = new dosen;
		$matakuliah = new matakuliah;
		return view('dosenmatakuliah.edit', compact('dosen','matakuliah','dosenmatakuliah'));
	}
	public function lihat($id)
	{
		$dosenmatakuliah = dosenmatakuliah::find($id);
		return view('dosenmatakuliah.lihat')->with(array('dosenmatakuliah'=>$dosenmatakuliah));
	}
	public function update($id, DosenmatakuliahRequest $input)
	{
		$dosenmatakuliah = dosenmatakuliah::find($id);
		$dosenmatakuliah->fill($input->only('dosen_id','matakuliah_id'));

		if($dosenmatakuliah->save()) $this->informasi = "Dosen Matakuliah Berhasil Di Perbaharui";
		return redirect('dosenmatakuliah')->with(['informasi' =>$this->informasi]);

		// $dosenmatakuliah->nama = $input ;
		// $dosenmatakuliah->nip = $input;
		// $dosenmatakuliah->alamat = $input;
		// $dosenmatakuliah->pengguna_id = $input;	
		// $dosenmatakuliah = save() ? 'Berhasil Update data' : 'gagal Update data';
		// return redirect('dosenmatakuliah')->with(['informasi'=>$informasi]);
	}
	public function hapus($id)
	{
		$dosenmatakuliah = dosenmatakuliah::find($id);
		$informasi = $dosenmatakuliah->delete()? 'Berhasil hapus data' : 'gagal hapus data';
		// if ($dosenlmatakuliah->delete()) $this->informasi = "Jadwal Dosen  Berhasil di Hapus";
		return redirect('dosenmatakuliah')->with(['informasi' =>$this->informasi]);


		// $informasi = $dosenmatakuliah->save()	? 'Berhasil hapus data' : 'gagal hapus data';
		// return redirect('dosenmatakuliah')->with(['informasi'=>$informasi]);
	}
}
