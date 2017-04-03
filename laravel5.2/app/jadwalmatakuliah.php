<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwalmatakuliah extends Model
{
    protected $table = 'jadwalmatakuliah';
    protected $fillable = ['mahasiswa_id','ruangan_id','dosenmatakuliah_id'];
    	public function mahasiswa()//fungsi dengan nama mahasiswa
    {
    	return $this->belongsTo(mahasiswa::class);// return nilai fungsi mahasiswa, dimana nilai return tersebut memiliki metode dengan nama belongsTo.
                                                  // belongsTo digunakan untuk mendefinisikan kebalikan dari hubungan yang ada pada model mahasiswa. 
                                                  // (mahasiswa::class) -> mahasiswa adalah nama dari model yang direlasikan pada model jadwal_matakuliah.
    }

    public function ruangan()//fungsi dengan nama ruangan
    {
    	return $this->belongsTo(ruangan::class);// return nilai fungsi ruangan, dimana nilai return tersebut memiliki metode dengan nama belongsTo.
                                                // belongsTo digunakan untuk mendefinisikan kebalikan dari hubungan yang ada pada model ruangan. 
                                                // (ruangan::class) -> ruangan adalah nama dari model yang direlasikan pada model jadwal_matakuliah.
    }

    public function dosenmatakuliah()//fungsi dengan nama dosen_matakuliah
    {
        return $this->belongsTo(dosenmatakuliah::class,'dosenmatakuliah');// return nilai fungsi dosen_matakuliah, dimana nilai return tersebut memiliki metode dengan nama belongsTo.
                                                         // belongsTo digunakan untuk mendefinisikan kebalikan dari hubungan yang ada pada model dosen_matakuliah. 
                                                         // (dosen_matakuliah::class,'dosen_matakuliah') -> dosen_matakuliah adalah nama dari model yang direlasikan pada model jadwal_matakuliah.
                                                         //                                                 dosen_matakuliah adalah nama foreign key, karena pada table jadwal_matakuliah foreign key nya bukan _id, maka perlu di definisikan pada metode belongsTo
    } 

}
