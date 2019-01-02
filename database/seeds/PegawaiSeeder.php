<?php

use Illuminate\Database\Seeder;
use App\Pegawai;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pegawai::create([
        	'pegawai' => 'Nuzulul Mas`ud'
        ]);

        Pegawai::create([
        	'pegawai' => 'Kristia Budi'
        ]);

        Pegawai::create([
        	'pegawai' => 'Hardika'
        ]);

        Pegawai::create([
        	'pegawai' => 'Nurul Aini'
        ]);

        Pegawai::create([
        	'pegawai' => 'Abdi Amirullah'
        ]);

        Pegawai::create([
        	'pegawai' => 'Hesti Mujiastuti'
        ]);
    }
}
