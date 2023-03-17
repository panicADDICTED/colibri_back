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
        Schema::create('freights', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('material_id');
            $table->string('quantity');
            $table->string('direction');
            $table->string('destiny');
            $table->float('price');
            $table->float('comision');
            $table->text('observations')->nullable();            
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->boolean('visible')->default(1);
            $table->string('status');
            $table->timestamps();
            $table->foreign('material_id')->references('id')->on('materials');
            $table->foreign('client_id')->references('id')->on('users');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('freights');
    }
};
