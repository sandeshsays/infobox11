<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('slogans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_ne');
            $table->string('content');
            $table->string('content_ne');
            $table->foreignId('palika_id')->constrained();
            $table->integer('order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slogans');
    }
};
