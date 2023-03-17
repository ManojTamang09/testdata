<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploads', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('fullname');
            $table->string('gender');
            $table->string('specialty');
            $table->string('Practice');
            $table->string('Phone');
            $table->string('Fax');
            $table->string('Email');
            $table->string('Address');
            $table->string('City');
            $table->string('County');
            $table->string('State');
            $table->string('Zip');
            $table->string('Latitude');
            $table->string('Longitude');
            $table->string('SIC');
            $table->string('Code');
            $table->string('Website');
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
        Schema::dropIfExists('uploads');
    }
}
