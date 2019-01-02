<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tujuan extends Model
{
	protected $table = 'tujuans';
    protected $fillable = ['tujuan'];

    public function surattugas(){
    	return $this->belongsToMany(Surattugas::class);
    }
}
