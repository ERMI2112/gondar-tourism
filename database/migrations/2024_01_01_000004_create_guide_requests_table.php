<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guide_requests', function (Blueprint $table) {
            $table->id();
            $table->string('tourist_name');
            $table->string('tourist_email');
            $table->string('tourist_phone')->nullable();
            $table->foreignId('guide_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('attraction_id')->nullable()->constrained()->onDelete('set null');
            $table->date('visit_date')->nullable();
            $table->integer('group_size')->default(1);
            $table->text('message')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected', 'completed'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guide_requests');
    }
};
