<?php

use Illuminate\Database\Seeder;

class SeederTableAnggota extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anggota')->delete();

        $anggota = array(
        	array('id'=>1,'nama'=> 'Tasik', 'alamat'=>'Loa Janan'),
        	array('id'=>2,'nama'=> 'Juni', 'alamat'=>'Loa Ulung'),
        	array('id'=>3,'nama'=> 'Ise', 'alamat'=>'Loa gagak'),
        	array('id'=>4,'nama'=> 'Atoel', 'alamat'=>'Loa duri')
        	);
        DB::table('anggota')->insert($anggota);
    }
}
