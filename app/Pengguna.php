<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'pengguna';	//misal nama modelnya jamak
    protected $fillable =['username','password'];	
}
