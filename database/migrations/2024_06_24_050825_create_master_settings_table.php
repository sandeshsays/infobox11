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
        Schema::create('master_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id')->nullable(); // client_id (int4, nullable)
            $table->integer('fiscal_year_id')->nullable(); // fiscal_year_id (int4, nullable)
            $table->string('code', 255)->nullable(); // code (varchar, length 255, nullable)
            $table->string('name_np', 255)->nullable(); // name_np (varchar, length 255, nullable)
            $table->string('name_en', 255)->nullable(); // name_en (varchar, length 255, nullable)
            $table->boolean('value')->nullable(); // value (bool, nullable)
            $table->boolean('status')->default(true); // status (bool, default true)
            $table->text('default_value')->nullable(); // default_value (text, nullable)
            $table->text('path')->nullable(); // path (text, nullable)
            $table->text('remarks')->nullable(); // remarks (text, nullable)
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_settings');
    }
};
