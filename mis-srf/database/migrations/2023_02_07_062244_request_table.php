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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('requestor_firstname', 50);
            $table->string('requestor_middlename', 50)->default();
            $table->string('requestor_lastname', 50);
            $table->longText('description');
            $table->string('ticket_num')->unique();
            $table->unsignedBigInteger('request_category_id');
            $table->longText('actions_taken')->nullable();
            $table->longText('recommendations')->nullable();
            $table->enum('status', ['active', 'pending', 'completed', 'denied','endorsed']);
            $table->unsignedBigInteger('technician_id');
            $table->longText('remarks');
            $table->time('repair_start_time')->nullable();
            $table->time('repair_end_time')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('request_category_id')->references('id')->on('request_categories');
            $table->foreign('technician_id')->references('id')->on('technicians');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
