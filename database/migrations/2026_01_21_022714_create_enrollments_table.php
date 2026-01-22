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
    Schema::create('enrollments', function (Blueprint $table) {
        $table->id();

        // Personal Data
        $table->string('name');
        
        // Remove ->required() here. It is implied by default.
        $table->string('email')->unique(); 
        
        $table->string('phone');

        // Application type
        $table->string('plan_type');
        $table->string('payment_reference')->nullable();
        
        // Status
        $table->string('status')->default('pending');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
