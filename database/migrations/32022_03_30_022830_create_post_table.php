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
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('title', 45);
            $table->longText('description');
            $table->string('status');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('type_report_id')->nullable();
            
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('set null');
           
            $table->foreign('category_id')
                    ->references('id')->on('categories')
                    ->onDelete('set null');

            $table->foreign('type_report_id')
                    ->references('id')->on('type_reports')
                    ->onDelete('set null');        
                   
            $table->timestamps();
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
};