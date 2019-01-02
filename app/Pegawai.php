<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
	protected $table = 'pegawais';
	protected $fillable = ['pegawai'];

    public function surattugas(){
    	return $this->belongsToMany(Surattugas::class);
    }
}
