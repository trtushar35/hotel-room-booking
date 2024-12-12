<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->decimal('discount_amount', 10, 2)->nullable(); // Store the discount amount
            $table->decimal('final_amount', 10, 2)->nullable();   // Store the final amount after discount
        });
    }
    
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('discount_amount');
            $table->dropColumn('final_amount');
        });
    }

};