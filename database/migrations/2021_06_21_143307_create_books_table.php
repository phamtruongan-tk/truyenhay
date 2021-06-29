<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('b_id');
            $table->integer('b_cate_id')->unsigned();
            $table->string('b_name');
            $table->string('b_slug');
            $table->longText('b_summary');
            $table->text('b_img');
            $table->string('b_author');
            $table->tinyInteger('b_active');
            $table->timestamps();
            $table->foreign('b_cate_id')->references('c_id')->on('cates')->onDelete('cascade');
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
