<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    proteccted $table ='anggota';
    proteccted $fillable = ['nama', 'alamat'];
}
