<?php

use Illuminate\Database\Seeder;
use App\Tujuan;

class TujuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tujuan::create([
        	'tujuan' => 'RSUD Sidoarjo'
        ]);

        Tujuan::create([
        	'tujuan' => 'RSAL dr.Ramelan Surabaya'
        ]);

        Tujuan::create([
        	'tujuan' => 'RSI Surabaya'
        ]);

        Tujuan::create([
        	'tujuan' => 'RS Dr.Soetomo Surabaya'
        ]);
    }
}
