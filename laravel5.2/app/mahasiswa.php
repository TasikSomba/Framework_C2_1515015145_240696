<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
	public function pengguna()
	{
		return $this->belongsTo(pengguna::class);
	}
	
    protected $table = 'mahasiswa';
    protected $fillable = ['nama','nim','alamat','pengguna_id'];
    $mahasiswa = pengguna::find(1)->mahasiswa;

    public function jadwalmatakuliah() //fungsi dengan nama jadwal_matakuliah
    {
    	return $this->hasMany(jadwalmatakuliah::class,'mahasiswa_id');// return nilai fungsi jadwalmatakuliah, dimana nilai return tersebut memiliki metode dengan nama hasMany.
                                                                       // hasMany menandakan bahwa relasi tersebut bernilai Many. dimana setiap mahasiswa dapat memiliki banyak jadwal_matakuliah.
                                                                       // (jadwalmatakuliah::class,'mahasiswa_id') -> jadwalmatakuliah adalah nama dari model yang direlasikan pada model mahasiswa.
                                                                       //                                              mahasiswa_id adalah nama field yang berfungsi sebagai foreign key.
    }
}

