<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// use App\Http\Requests;

use App\dosen;

class RelationshipRebornController extends Controller
{
    public function ujiHas(){
    	return dosen::has('dosenmatakuliah')->get();
    }

    public function ujiDoesntHave(){
    	return dosen::doesntHave('dosenmatakuliah')->get();
    }
}
