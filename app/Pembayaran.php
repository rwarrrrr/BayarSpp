<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    //
    protected $table = 'pembayaran';
    //
    protected $primaryKey = 'id_pembayaran';
    //
    protected $fillable = [
    	'id_petugas','nisn','tgl_bayar','bulan_dibayar','tahun_dibayar','id_spp','jumlah_bayar'
    ];


    public function petugas() {
    	return $this->hasOne('App\Petugas','id_petugas','id_petugas');
    }

    public function siswa() {
    	return $this->hasOne('App\Siswa','nisn','nisn');
    }

    public function spp() {
    	return $this->hasOne('App\Spp','id_spp','id_spp');
    }


}
