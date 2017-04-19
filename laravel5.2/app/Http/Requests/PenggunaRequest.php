<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JadwalmatakuliahRequest extends Request
{
   public function authorize()
   {
   	 return true;
   }

   public function rules()
   {
   	$validasi = [
   	'mahasiswa_id'=>'required|integer',
   	'ruangan_id'=>'required|integer',
   	'dosenmatakuliah_id'=>'required|integer',
   	];   	
   	return $validasi;
   }
}
