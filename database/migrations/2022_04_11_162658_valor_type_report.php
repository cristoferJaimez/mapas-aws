<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    static $type = [
        'flash',
        'pharmacist',
    ];

    public function up()
    {
        Schema::table('type_reports', function (Blueprint $table) {
            //
           });
           //cargar datos predetermiandos
           foreach (self::$type as $ty) {
           DB::table("type_reports")
           ->insert(['type' => $ty ,
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
