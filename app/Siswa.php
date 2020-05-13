<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    //
    protected $table = 'siswa';
    //
    protected $primaryKey = 'nisn';
    //
    protected $fillable = [
    	'nis','nama','id_kelas','alamat','no_telp','id_spp'
    ];

    public function kelas() {
    	return $this->hasOne('App\Kelas','id_kelas','id_kelas');
    }

    public function spp() {
        return $this->hasOne('App\Spp','id_spp','id_spp');
    }

}
