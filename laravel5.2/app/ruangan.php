<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ruangan extends Model
{
    protected $table = 'ruangan';
    protected $fillable = ['title'];

     public function jadwalmatakuliah() // fungsi dengan nama jadwal_matakuliah
    {
    	return $this->hasMany(jadwalmatakuliah::class,'ruangan_id');// return nilai fungsi jadwal_matakuliah, dimana nilai return tersebut memiliki metode dengan nama hasMany.
														// hasMany menandakan bahwa relasi tersebut bernilai Many. dimana setiap ruangan dapat memiliki banyak jadwal_matakuliah.
                                                        // (jadwal_matakuliah::class,'ruangan_id') -> jadwal_matakuliah adalah nama dari model yang direlasikan pada model ruangan.
                                                        //                                              ruangan_id adalah nama field yang berfungsi sebagai foreign key.
    }
}
