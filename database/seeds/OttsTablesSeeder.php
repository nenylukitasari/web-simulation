<?php

use Illuminate\Database\Seeder;
use App\ott;

class OttsTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	ott::create([
            'tanggal'   => '2018-08-02',
            'witel'     => 'SBS',
            'catchplay' => '200',
            'iflix'     => '200',
            'hooq'      => '200',
            'movin'     => '200',
            'salesDIY'  => '2000',
            'treshold'  => '70',
    	]);
        //
    }
}
