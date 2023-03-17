<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcelDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('your_table_name', function (Blueprint $table) {
            $table->id();
            $table->string('column_1');
            $table->string('column_2');
            $table->string('column_3');
            $table->string('column_4');
            $table->string('column_5');
            $table->string('column_6');
            $table->string('column_7');
            $table->string('column_8');
            $table->string('column_9');
            $table->string('column_10');
            $table->string('column_11');
            $table->string('column_12');
            $table->string('column_13');
            $table->string('column_14');
            $table->string('column_15');
            $table->string('column_16');
            $table->string('column_17');
            $table->string('column_18');
            $table->string('column_19');
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
        Schema::dropIfExists('your_table_name');
    }
}
