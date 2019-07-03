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
        Schema::create('submissions', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('new_category');
            $table->string('category_name', 100)->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->smallInteger('qty')->nullable();
            $table->char('status', 1); // 1 : Menunggu, 2 : dikonfirmasi, 3 : ditolak
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
