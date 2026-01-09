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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('fathers_name');
            $table->string('neet_hall_ticket_number')->unique();
            $table->string('application_number')->unique();
            $table->integer('neet_marks');
            $table->integer('all_india_rank');
            $table->string('category_rank_name');
            $table->date('date_of_birth');
            $table->string('email')->unique();
            $table->string('phone', 15);
            $table->string('previous_school_name');
            $table->string('rural_urban');
            $table->string('medium_till_10th');
            $table->string('curriculum');
            $table->text('address');
            $table->string('district');
            $table->string('state');
            $table->string('category_selection');
            $table->boolean('claiming_article')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
