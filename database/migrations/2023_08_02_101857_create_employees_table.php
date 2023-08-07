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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('created_by')->nullable()->references('id')->on('users')->nullOnDelete();
            $table->string('number');
            $table->string('email');
            $table->string('age');
            $table->foreignId('job_id')->constrained('jobs')->onDelete('cascade');
            $table->string('status')->default('Employee');
            $table->foreignId('supervisor')->nullable()->references('id')->on('employers');
            $table->timestamps();

        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('employees', function (Blueprint $table) {

            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('employees');
    }
};
