<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableItemSubmissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_submissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_name', 100);
            $table->boolean('new_category');
            $table->unsignedInteger('category_id')->nullable();
            $table->char('status', 1);
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('category_id')
                  ->references('id')->on('categories')
                  ->onDelete('set null')->onUpdate('cascade');   
            $table->foreign('user_id')
                  ->references('id')->on('users')
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
        Schema::dropIfExists('item_submissions');
    }
}
