<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// use App\Http\Requests;

use App\mahasiswa;

class RelantionshipRebornController2 extends Controller
{
     public function ujiHas(){
    	return mahasiswa::has('jadwalmatakuliah')->get();
    }

    public function ujiDoesntHave(){
    	return mahasiswa::doesntHave('jadwalmatakuliah')->get();
    }
}
