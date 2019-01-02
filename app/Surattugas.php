<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surattugas extends Model
{
    protected $table = 'surattugas';
    protected $fillable = [
    	'nomor_surat',
    	'nomor_polisi',
    	'kegiatan',
    	'jabatan',
    	'tanggal_tugas',
        'tanggal_akhir',
    	'status_ttd'
    ];

    public function pegawais(){
    	return $this->belongsToMany(Pegawai::class);
    }

    public function tujuans(){
    	return $this->belongsToMany(Tujuan::class);
    }
}
