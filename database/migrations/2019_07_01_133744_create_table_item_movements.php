<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableItemMovements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->increments('id');
            $table->char('item_id', 8);
            $table->unsignedInteger('user_id')->nullable();
            $table->char('from_position', 1);
            $table->char('to_position', 1);
            $table->unsignedInteger('from_unit')->nullable();
            $table->unsignedInteger('to_unit')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('set null')->onUpdate('cascade'); 
            $table->foreign('item_id')
                  ->references('id')->on('items')
                  ->onDelete('cascade')->onUpdate('cascade'); 

            $table->foreign('from_unit')
                  ->references('id')->on('units')
                  ->onDelete('set null')->onUpdate('cascade'); 
            $table->foreign('to_unit')
                  ->references('id')->on('units')
                  ->onDelete('set null')->onUpdate('cascade');                   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movements');
    }
}
