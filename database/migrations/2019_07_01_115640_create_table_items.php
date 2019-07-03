<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->char('id', 8)->primary();
            $table->unsignedInteger('category_id');
            $table->string('description', 100);
            $table->char('position', 1); // 1 = di gudang, 2 = di unit, 3 = di laundry, 4 = hilang
            $table->unsignedInteger('unit_id')->nullable();
            $table->timestamps();

            $table->foreign('category_id')
                  ->references('id')->on('categories')
                  ->onDelete('cascade')->onUpdate('cascade');        
            $table->foreign('unit_id')
                  ->references('id')->on('units')
                  ->onDelete('cascade')->onUpdate('cascade');                          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
