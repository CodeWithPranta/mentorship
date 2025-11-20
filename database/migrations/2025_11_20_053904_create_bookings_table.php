<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->date('dob');
            $table->string('education');
            $table->string('nid_no');
            $table->string('permanent_address');
            $table->string('profession');
            $table->string('photo')->nullable();

            $table->string('package'); // Basic / Premium / Advance
            $table->integer('package_amount'); // auto filled by selected package
            $table->string('trx_id')->nullable();
            $table->string('send_money_number')->nullable();

            $table->enum('payment_status', ['pending', 'paid'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
