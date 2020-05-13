<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //
    protected $table = 'kelas';
    //
    protected $primaryKey = 'id_kelas';
    //
    protected $fillable = [
    	'nama_kelas','kompetensi_keahlian'
    ];

}
