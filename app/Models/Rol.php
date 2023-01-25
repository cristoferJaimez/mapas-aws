<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'users_rol';

    protected $fillable = [
        'id',
        'description',
    ];

    protected $hidden = [
    ];

 
    //show
    public function show(){
        return Rol::all();
    }

    //create

    //update

    //edit

    //delete

}
