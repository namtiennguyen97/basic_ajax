<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAccessories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessory', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('vendor');
            $table->unsignedBigInteger('computer_id')->nullable();
            $table->foreign('computer_id')->references('id')->on('computer');
            $table->string('image')->nullable();
            $table->integer('price');
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
        Schema::dropIfExists('accessory');
    }
}
