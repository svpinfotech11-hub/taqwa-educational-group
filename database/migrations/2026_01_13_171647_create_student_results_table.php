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
        Schema::create('student_results', function (Blueprint $table) {
            $table->id();
             // Exam / Result Info
    $table->string('exam_name');
    $table->string('exam_year')->nullable();

    // Student Info
    $table->string('student_name');
    $table->string('roll_no')->unique();
    $table->string('registration_no')->nullable();
    $table->string('father_name')->nullable();
    $table->string('mother_name')->nullable();
    $table->date('dob')->nullable();

    // Academic Info
    $table->integer('marks')->nullable();
    $table->decimal('percentage', 5, 2)->nullable();
    $table->string('rank')->nullable();
    $table->enum('result_status', ['Pass', 'Fail'])->default('Pass');

    // Media
    $table->string('photo')->nullable();
    $table->string('pdf_path')->nullable();

    // Meta
    $table->string('certificate_no')->unique();
    $table->date('issue_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_results');
    }
};
