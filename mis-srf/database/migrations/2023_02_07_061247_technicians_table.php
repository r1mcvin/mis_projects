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
        Schema::create('technicians', function (Blueprint $table) {
            $table->id();
            $table->string('given_name', 50);
            $table->string('middle_name', 50);
            $table->string('last_name', 50);
            $table->unsignedBigInteger('technician_status_id');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->unsignedBigInteger('current_ticket')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('technicians');
    }
};
