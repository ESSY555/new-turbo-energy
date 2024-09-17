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

            Schema::create('complaints', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('phone');
                $table->string('location');
                $table->string('spn');
                $table->string('email');
                $table->date('date_of_complaint');
                $table->text('complaint');
                $table->unsignedBigInteger('received_by')->nullable();
                $table->unsignedBigInteger('resolved_by')->nullable();
                $table->enum('status', ['pending', 'resolved', 'unresolved'])->default('pending');
                $table->timestamps();
            });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
