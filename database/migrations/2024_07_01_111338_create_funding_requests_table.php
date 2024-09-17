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
        Schema::create('funding_requests', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 10, 2);
            $table->string('location');
            $table->text('reason');
            $table->decimal('initial_funding', 10, 2);
            $table->decimal('current_balance', 10, 2);
            $table->date('date');
            $table->time('time');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funding_requests');
    }
};
