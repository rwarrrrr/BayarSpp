<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    //
    protected $table = 'spp';
    //
    protected $primaryKey = 'id_spp';
    //
    protected $fillable = [
    	'tahun','nominal'
    ];
}
