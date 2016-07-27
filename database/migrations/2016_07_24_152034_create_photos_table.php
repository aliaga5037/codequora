<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string("file_name");
            $table->string("file_size");
            $table->string("file_mime");
            $table->string("file_path");
            $table->integer("company_id")->unsigned()->index();
            $table->foreign("company_id")->references('id')->on('companies')->onDelete('cascade');
            $table->integer("tour_id")->unsigned()->index();
            $table->foreign("tour_id")->references('id')->on('tours')->onDelete('cascade');
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
        Schema::drop('photos');
    }
}
