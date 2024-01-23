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
            $table->timestamp('horairedebut')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('horairefin')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean('Validation')->default(false);
            $table->string('Commentaire')->nullable();
            $table->foreignId('idusers')->constrained(table: 'users', indexName:'appointements_users_id')->onUpdate('cascade')->onDelete('cascade');
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
