<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('rating');
            $table->string('review');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
