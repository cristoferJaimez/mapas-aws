<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $table = 'regions';

    protected $fillable = [
        'id',
        'co_region',
        'region',


    ];



    protected $hidden = [
    ];


    //show
    public function getAll(){
      return Region::all();
    }
}
