<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nr')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('place');
            $table->ipAddress('ip');
            $table->boolean('verf')->default(0);
            $table->string('token')->nullable();
            $table->date('end_verf_date');
            $table->timestamps();
        });

        Schema::table('books', function($table) {
       $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
   });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
