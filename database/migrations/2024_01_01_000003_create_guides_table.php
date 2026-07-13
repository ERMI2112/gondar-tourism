<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guides', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('phone')->nullable();
            $table->string('languages')->default('English');
            $table->string('specialization')->nullable();
            $table->string('license_number')->nullable();
            $table->text('bio')->nullable();
            $table->string('price_range')->nullable();
            $table->enum('availability_status', ['available', 'busy', 'unavailable'])->default('available');
            $table->string('photo')->nullable();
            $table->enum('approval_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guides');
    }
};
