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
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->string('ext_id')->unique();
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('program_id')->constrained();
            $table->string('ext_program_id');
            $table->string('payment_url');
            $table->datetime('expired_date')->nullable();
            $table->integer('total_amount');
            $table->datetime('paid_date')->nullable();
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
        Schema::dropIfExists('payment');
    }
};
