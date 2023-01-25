<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    static $category = [
        'power bi',
        'other',
    ];

    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            //
           });
           //cargar datos predetermiandos
           foreach (self::$category as $cat) {
           DB::table("categories")
           ->insert(['category' => $cat ,
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
        //
    }
};
