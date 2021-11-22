<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('result', 500);
            $table->unsignedBigInteger('id_element')->unsigned()->index()->nullable();
            $table->foreign('id_element')->references('id')->on('elements');
            $table->unsignedBigInteger('id_method')->unsigned()->index()->nullable();
            $table->foreign('id_method')->references('id')->on('methods');
            $table->unsignedBigInteger('id_unit')->unsigned()->index()->nullable();
            $table->foreign('id_unit')->references('id')->on('units');
            $table->unsignedBigInteger('id_customer')->unsigned()->index()->nullable();
            $table->foreign('id_customer')->references('id')->on('customers');
            $table->unsignedBigInteger('id_user')->unsigned()->index()->nullable();
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('tests');
    }
}
