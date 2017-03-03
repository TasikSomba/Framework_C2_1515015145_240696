<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Authenticatable
{
    proteccted $table ='anggota';
    proteccted $fillable = ['nama', 'alamat'];
}
