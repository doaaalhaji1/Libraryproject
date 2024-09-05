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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('employee_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('recipient_user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->date('reservation_start_date');
            $table->date('reservation_end_date');
            $table->enum('status', ['pending', 'approved', 'rejected','delivered'])->default('pending');
            $table->timestamps();

        });
    }
    //

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
