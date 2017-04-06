<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matakuliah extends Model
{
    protected $table = 'matakuliah';
    protected $fillable = ['title','keterangan'];
    public function dosen_matakuliah() // fungsi dengan nama dosen_matakul
    {
    	return $this->hasMany(dosenmatakuliah::class,'matakuliah_id');// return nilai fungsi dosen_matakuliah, dimana nilai return tersebut memiliki metode dengan nama hasMany.
                                                                       // hasMany menandakan bahwa relasi tersebut bernilai Many. dimana setiap matakuliah dapat memiliki banyak dosen_matakuliah.
                                                                       // (dosen_matakuliah::class,'matakuliah_id') -> dosen_matakuliah adalah nama dari model yang direlasikan pada model matakuliah.
                                                                       //                                              matakuliah_id adalah nama field yang berfungsi sebagai foreign key.
    }
    public function listMatakuliahdanDosen(){
      $out =[];
      foreach ($this->all() as $matakuliah){
        $out[$matakuliah->id] = "{$matakuliah->title}";
      }
      return $out;
    }
}
