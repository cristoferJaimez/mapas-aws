<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Providers extends Model
{
    use HasFactory;

    protected $table = 'providers';

    protected $fillable = [
        'id',
        'description',
        'url'
    ];

    protected $hidden = [
    ];

    public function show(){
        return Pharma::all();
    }
}
