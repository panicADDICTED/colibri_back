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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->string('last_name')->after('name');
            $table->string('phone');
            $table->string('sex');
            $table->string('age');
            $table->string('card_number')->nullable();
            $table->string('license_number')->nullable();
            $table->boolean('membership_status')->default(0);
            $table->float('membership_quantity')->nullable();
            $table->boolean('visible')->default(1);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
