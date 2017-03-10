<?php

use Illuminate\Database\Seeder;

class SeederTableHobi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('hobi')->delete();
        $hobi = array(
            array('hobi'=> 'Traveling',)'anggota_id'=>'1'),
            array('hobi'=> 'Nonton',)'anggota_id'=>'2'),
            array('hobi'=> 'Membaca',)'anggota_id'=>'1'),
            array('hobi'=> 'Kuliner',)'anggota_id'=>'2'),
            );
DB::table('hobi')->insert($hobi);
    
    }
}
