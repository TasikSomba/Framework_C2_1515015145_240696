<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dosenmatakuliah extends Model
{
    protected $table ='dosenmatakuliah';
    protected $fillable = ['dosen_id','matakuliah_id'];

     public function dosen() //fungsi dengan nama dosen
    {
    	return $this->belongsTo(dosen::class); // return nilai fungsi dosen, dimana nilai return tersebut memiliki metode dengan nama belongsTo.
                                               // belongsTo digunakan untuk mendefinisikan kebalikan dari hubungan yang ada pada model dosen. 
                                               // (dosen::class) -> dosen adalah nama dari model yang direlasikan pada model dosen_matakuliah.
    }

    public function matakuliah() //fungsi dengan nama matakuliah
    {
    	return $this->belongsTo(matakuliah::class); // return nilai fungsi matakuliah, dimana nilai return tersebut memiliki metode dengan nama belongsTo.
                                                    // belongsTo digunakan untuk mendefinisikan kebalikan dari hubungan yang ada pada model matakuliah. 
                                                    // (matakuliah::class) -> matakuliah adalah nama dari model yang direlasikan pada model dosen_matakuliah.
    }

    public function jadwalmatakuliah() //fungsi dengan nama jadwal_matakuliah
    {
        return $this->hasMany(jadwalmatakuliah::class,'dosenmatakuliah');// return nilai fungsi jadwal_matakuliah, dimana nilai return tersebut memiliki metode dengan nama hasMany.
                                                                           // hasMany menandakan bahwa relasi tersebut bernilai Many. dimana setiap dosen_matakuliah dapat memiliki banyak jadwal_matakuliah.
                                                                           // (jadwal_matakuliah::class,'dosen_matakuliah_id') -> jadwal_matakuliah adalah nama dari model yang direlasikan pada model dosen_matakuliah.
                                                                           //                                                     dosen_matakuliah adalah nama field yang berfungsi sebagai foreign key.
    } 
}
