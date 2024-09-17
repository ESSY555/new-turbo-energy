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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            // $table->string('warehouse');
            $table->string('name');
            $table->string('code');
            $table->string('address');
            $table->string('description');
            $table->string('units');
            $table->timestamp('created_at')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
