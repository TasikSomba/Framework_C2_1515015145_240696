<?php

use App\pengguna;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function(){
	$dosen_mengajar = App\dosen::with('pengguna')->get();
	return $dosen_mengajar;

});

Route::get('jadwalmatakuliah/lihat/{jadwalmatakuliah}', 'jadwalmatakuliahController@lihat');
Route::post('jadwalmatakuliah/simpan','jadwalmatakuliahController@simpan');
Route::get('jadwalmatakuliah/edit/{jadwalmatakuliah}', 'jadwalmatakuliahController@edit');
Route::post('jadwalmatakuliah/edit/{jadwalmatakuliah}','jadwalmatakuliahController@update');
Route::get('jadwalmatakuliah/hapus/{jadwalmatakuliah}','jadwalmatakuliahController@hapus');
Route::get('jadwalmatakuliah/tambah', 'jadwalmatakuliahController@tambah');
Route::get('jadwalmatakuliah', 'jadwalmatakuliahController@awal');
Route::get('master',function(){
	return 'mahasiswa_id : 1';
});

Route::get('dosenmatakuliah/lihat/{dosenmatakuliah}', 'dosenmatakuliahController@lihat');
Route::post('dosenmatakuliah/simpan','dosenmatakuliahController@simpan');
Route::get('dosenmatakuliah/edit/{dosenmatakuliah}', 'dosenmatakuliahController@edit');
Route::post('dosenmatakuliah/edit/{dosenmatakuliah}','dosenmatakuliahController@update');
Route::get('dosenmatakuliah/hapus/{dosenmatakuliah}','dosenmatakuliahController@hapus');
Route::get('dosenmatakuliah/tambah', 'dosenmatakuliahController@tambah');
Route::get('dosenmatakuliah', 'dosenmatakuliahController@awal');
Route::get('master',function(){
	return 'dosen_id : 3';
});

Route::get('dosen/lihat/{dosen}', 'dosenController@lihat');
Route::post('dosen/simpan','dosenController@simpan');
Route::get('dosen/edit/{dosen}', 'dosenController@edit');
Route::post('dosen/edit/{dosen}','dosenController@update');
Route::get('dosen/hapus/{dosen}','dosenController@hapus');
Route::get('dosen/tambah', 'dosenController@tambah');
Route::get('dosen', 'dosenController@awal');
Route::get('master',function(){
	return 'nama : Masnah';
});


/*Route::get('mahasiswa/{mahasiswa}', 'mahasiswaController@lihat');*/
Route::get('mahasiswa/lihat/{mahasiswa}', 'mahasiswaController@lihat');
Route::post('mahasiswa/simpan','mahasiswaController@simpan');
Route::get('mahasiswa/edit/{mahasiswa}', 'mahasiswaController@edit');
Route::post('mahasiswa/edit/{mahasiswa}','mahasiswaController@update');
Route::get('mahasiswa/hapus/{mahasiswa}','mahasiswaController@hapus');
Route::get('mahasiswa/tambah', 'mahasiswaController@tambah');
Route::get('mahasiswa', 'mahasiswaController@awal');
Route::get('master',function(){
	return 'pengguna_id : 1';
});


Route::get('matakuliah/lihat/{matakuliah}', 'matakuliahController@lihat');
Route::post('matakuliah/simpan','matakuliahController@simpan');
Route::get('matakuliah/edit/{matakuliah}', 'matakuliahController@edit');
Route::post('matakuliah/edit/{matakuliah}','matakuliahController@update');
Route::get('matakuliah/hapus/{matakuliah}','matakuliahController@hapus');
Route::get('matakuliah/tambah', 'matakuliahController@tambah');
Route::get('matakuliah', 'matakuliahController@awal');
Route::get('master',function(){
	return 'title : S.Kom';
});

Route::get('ruangan/lihat/{ruangan}','ruanganController@lihat');
Route::post('ruangan/simpan','ruanganController@simpan');
Route::get('ruangan/edit/{ruangan}','ruanganController@edit');
Route::post('ruangan/edit/{ruangan}','ruanganController@update');
Route::get('ruangan/hapus/{ruangan}','ruanganController@hapus');
Route::get('ruangan/tambah', 'ruanganController@tambah');
Route::get('ruangan', 'ruanganController@awal');
Route::get('master',function(){
	return 'title : 406';
});


Route::get('pengguna/lihat/{pengguna}','penggunaController@lihat');
Route::post('pengguna/simpan','penggunaController@simpan');
Route::get('pengguna/edit/{pengguna}', 'penggunaController@edit');
Route::post('pengguna/edit/{pengguna}','penggunaController@update');
Route::get('pengguna/hapus/{pengguna}','penggunaController@hapus');
Route::get('pengguna/tambah','penggunaController@tambah');
Route::get('pengguna','penggunaController@awal');
Route::get('master',function(){
	return 'Nama Saya : Tasik Somba';
});

Route::get('ujiHas','RelationshipRebornController@ujiHas');
Route::get('ujiDoesntHave','RelationshipRebornController@ujiDoesntHave');
Route::get('/cari_relasi_h_dosen', function(){
	return \App\dosenmatakuliah::whereHas('dosen',function($query){
		$query->where('nama','like','%s%');

	})->with('dosen')
	  ->groupBy('dosen_id')
	  ->get();
});

Route::get('/cari_relasi_a_dosenmatakuliah', function(){
	return \App\dosenmatakuliah::whereHas('dosen',function($query){
		$query->where('nama','like','%a%');
	})
	->orWhereHas('jadwalmatakuliah',function($kueri){
		$kueri->where('ruangan_id','like','_');
	})
	->with('dosen','matakuliah')
	->groupBy('dosen_id')
	->get();
});

Route::get('/cari_relasi_a_mahasiswa', function(){
	return \App\jadwalmatakuliah::whereHas('mahasiswa',function($Kuuery){
		$kuuery->where('nama','like','%a%');
	})
	->with('mahasiswa')
	->groupBy('mahasiswa_id')
	->get();
});

Route::get('/cari_relasi_a_0_jadwalmatakuliah', function(){
	return \App\jadwalmatakuliah::whereHas('mahasiswa',function($Kuuery){
		$kuuery->where('nama','like','%a%');
	})
	->orWhereHas('ruangan', function($Kuueri){
		$Kuueri->where('title','like','%0%');
	})
	->with('mahasiswa','ruangan')
	->groupBy('mahasiswa_id')
	->get();
});



Route::get('/', function () {
    return view('master');
});

Route::get('/',function(Illuminate\Http\Request $request)
{
	echo "ini adalah request dari method get". $request->nama;

	});
use Illuminate\Http\Request;
Route::get('/',function(){
	echo Form::open(['url'=>'/']).
		 Form::label('nama').
		 Form::text('nama',null).
		 Form::submit('kirim').
		 Form::close();
});
Route::post('/',function(Request $request){
	echo "Hasil dari Form input tadi nama : ".$request->nama;
});


Route::get('/public', function(){
	return('Nama Saya :Tasik Somba B.L');
	});
Route::get('hello-world',function (){
	return('hello world');
	});


