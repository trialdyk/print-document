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
        Schema::create('rekaps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->date('juli')->nullable();
            $table->date('agustus')->nullable();
            $table->date('septemer')->nullable();
            $table->date('oktober')->nullable();
            $table->date('november')->nullable();
            $table->date('desember')->nullable();
            $table->date('januari')->nullable();
            $table->date('februari')->nullable();
            $table->date('maret')->nullable();
            $table->date('april')->nullable();
            $table->date('mei')->nullable();
            $table->date('juni')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekaps');
    }
};
