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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade'); // Links to the rooms table
            $table->string('description')->nullable(); // Optional discount description
            $table->decimal('discount_percentage', 5, 2); // Percentage discount (e.g., 10.50%)
            $table->date('start_date'); // Discount start date
            $table->date('end_date'); // Discount end date
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
