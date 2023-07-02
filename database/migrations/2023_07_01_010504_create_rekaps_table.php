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
            $table->date('juli')->format('d/m/Y')->nullable();
            $table->date('agustus')->format('d/m/Y')->nullable();
            $table->date('septemer')->format('d/m/Y')->nullable();
            $table->date('oktober')->format('d/m/Y')->nullable();
            $table->date('november')->format('d/m/Y')->nullable();
            $table->date('desember')->format('d/m/Y')->nullable();
            $table->date('januari')->format('d/m/Y')->nullable();
            $table->date('februari')->format('d/m/Y')->nullable();
            $table->date('maret')->format('d/m/Y')->nullable();
            $table->date('april')->format('d/m/Y')->nullable();
            $table->date('mei')->format('d/m/Y')->nullable();
            $table->date('juni')->format('d/m/Y')->nullable();
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
