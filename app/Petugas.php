<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    //
    protected $table = 'petugas';
    //
    protected $primaryKey = 'id_petugas';
    //
    protected $fillable = [
    	'username','password','nama_petugas','level'
    ];
}
