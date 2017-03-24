<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwalmatakuliah extends Model
{
    protected $table = 'jadwalmatakuliah';
    protected $fillable = ['mahasiswa_id','ruangan_id','dosenmatakuliah_id'];
}
