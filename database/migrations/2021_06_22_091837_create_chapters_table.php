<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->increments('ch_id');
            $table->integer('ch_book_id')->unsigned();
            $table->string('ch_title');
            $table->string('ch_slug');
            $table->longText('ch_content');
            $table->tinyInteger('ch_active');
            $table->timestamps();
            $table->foreign('ch_book_id')->references('b_id')->on('books')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapters');
    }
}
