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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
              ->references('id')->on('users');
            $table->unsignedBigInteger('office_id');
            $table->foreign('office_id')
              ->references('id')->on('officers');
            $table->text('name');
            $table->integer('price');
            $table->integer('phone');
            $table->string('stat');
            $table->boolean('active');
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
        Schema::drop('reports');
    }
};
