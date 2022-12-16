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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('external_id')->unique();
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('program_id')->constrained();
            $table->integer('total_price');
            $table->string('payment_url');
            $table->integer('remind_count');
            $table->datetime('expired_date');
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
        Schema::dropIfExists('invoices');
    }
};
