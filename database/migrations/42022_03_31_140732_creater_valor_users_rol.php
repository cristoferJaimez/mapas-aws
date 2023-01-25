<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    static $rols = [
            'admin',
            'proveedores',
            'cadena / distribuidores',
            'laboratorio coorporaciones',
            'cliente interno',
            'cliente interno / UTC',
    ];

    public function up()
    {
        Schema::table('users_rol', function (Blueprint $table) {
         //
        });
        //cargar datos predetermiandos
        foreach (self::$rols as $rol) {
        DB::table("users_rol")
        ->insert(['description' => $rol ,
                  'created_at'  => now()->toDateString()." ". now()->toTimeString(),
                  'updated_at'  => now()->toDateString(). " ". now()->toTimeString(),    
                ]);
        }        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_rol', function (Blueprint $table) {
            //
        });
    }
};