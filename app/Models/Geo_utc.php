<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geo_utc extends Model
{
    use HasFactory;


    protected $table = 'geo_utc';
    
    protected $fillable = [
        'region_id',
        'departamento_id',
        'municipio_id',
        'localidad_id',
        'barrio_id',
    ];



    //show
    public function allUTC(){
        return Geo_utc::all();
    }
}
