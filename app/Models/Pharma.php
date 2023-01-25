<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharma extends Model
{
    use HasFactory;

    protected $table = 'phar';

    protected $fillable = [
        'id',
        'cod',
        'name_original',
        'utc',
        'adress',
        'cod_sub_canal',
        'identificador_base',
        'cod_cadena',
         'lat',
         'lng',
         'img',
         'adress_real',
         'status',
    ];

    protected $hidden = [
    ];

    public function show(){
        return Pharma::all();
    }
}
