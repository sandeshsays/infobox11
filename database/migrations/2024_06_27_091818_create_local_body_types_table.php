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
        Schema::create('local_body_types', function (Blueprint $table) {
            $table->id();
            $table->string('code', 255)->nullable(); // varchar(255)
            $table->string('name_np', 255)->nullable(); // varchar(255)
            $table->string('name_en', 255)->nullable(); // varchar(255)
            $table->boolean('status')->default(true); // bool, default true
            $table->unsignedBigInteger('created_by')->nullable(); // int8
            $table->unsignedBigInteger('updated_by')->nullable(); // int8
            $table->unsignedBigInteger('deleted_by')->nullable(); // int8
            // Indexes
            $table->index('code');
            $table->index('status');
            $table->index('created_by');
            $table->index('updated_by');
            $table->index('deleted_by');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('local_body_types');
    }
};
