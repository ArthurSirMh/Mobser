<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->nullable()
                ->constrained('classes')
                ->onDelete('cascade');
            $table->foreignId('user_id')->nullable()
                ->constrained('users')
                ->onDelete('cascade');
            $table->enum('message_is_send', ['0', '1', '2'])->default('0');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absences');
    }
};
