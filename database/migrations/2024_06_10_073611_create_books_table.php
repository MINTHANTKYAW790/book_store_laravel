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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('code_number', "20");
            $table->string('name', "100");
            $table->integer('price');
            $table->date('publishing_date');
            $table->string('description', "max");
            $table->string('image', "100");
            $table->string('save_pdf', "100");
            $table->integer('deleted');
            $table->integer('author_id');
            $table->integer('genre_id');
            $table->integer('publishing_house_id');
            $table->integer('inserted_by');
            $table->integer('edition');
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
        Schema::dropIfExists('books');
    }
};
