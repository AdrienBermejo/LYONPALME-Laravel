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
            $table->string('Commentaire');
            /*$table->integer('idusers')->unsigned();
            $table->integer('iddisponibilities')->unsigned();*/
            $table->timestamps();
        });

        /*Schema::table('appointements',function($table){
            $table->foreign('idusers')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('iddisponibilities')->references('id')->on('disponibilities')->onDelete('cascade');
        });*/
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointements');
    }
};
