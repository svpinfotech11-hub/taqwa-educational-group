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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
                  $table->foreignId('category_id')->constrained('registration_categories')->onDelete('cascade');  // Foreign key for registration category
        $table->string('registration_id')->unique(); // Unique registration ID (REG-xxxxxx)
        $table->string('name');
        $table->string('email')->unique();
        $table->string('phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
