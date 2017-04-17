<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{

    protected $table = 'dosen';
    protected $fillable = ['nama','nip','alamat','pengguna_id'];
    public function pengguna(){ //fungsi dengan nama pengguna
    	return $this->belongsTo(pengguna::class);// return nilai fungsi pengguna, dimana nilai return tersebut memiliki metode dengan nama belongsTo.
                                                 // belongsTo digunakan untuk mendefinisikan kebalikan dari hubungan yang ada pada model pengguna. 
                                                 // (pengguna::class) -> pengguna adalah nama dari model yang direlasikan pada model dosen.

    }
    public function dosenmatakuliah(){//fungsi dengan nama dosen_matakuliah
    	return $this->hasMany(dosenmatakuliah::class);// return nilai fungsi dosen_matakuliah, dimana nilai return tersebut memiliki metode dengan nama hasMany.

      //kalo ada eror tambahkan (,dosenmatakuliah_id)
                                                                  // hasMany menandakan bahwa relasi tersebut bernilai Many. dimana setiap dosen dapat mengajar banyak matakuliah.
                                                                  // (dosen_matakuliah::class,'dosen_id') -> dosen_matakuliah adalah nama dari model yang direlasikan pada model dosen.
                                                                  //                                         dosen_id adalah nama field yang berfungsi sebagai foreign key.
    }

    public function getUsernameAttribute(){
      return $this->pengguna->username;
    }

    public function listDosenDanNip(){
      $out =[];
      foreach ($this->all() as $dosen){
        $out[$dosen->id] = "{$dosen->nama} ({$dosen->nip})";
      }
      return $out;
    }
}
