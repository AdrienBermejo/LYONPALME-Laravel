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
        Schema::create('appointements', function (Blueprint $table) {
            $table->id();
            $table->timestamp('horairedebut');
            $table->timestamp('horairefin');
            $table->boolean('Validation')->default(false);
            $table->string('Comment')->nullable();
            $table->string('Commentaire')->nullable();
            $table->foreignId('idusers')->nullable()->constrained('users')->index()->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointements');
    }

};
