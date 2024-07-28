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
        Schema::create('local_bodies', function (Blueprint $table) {
            $table->id();
            $table->string('province_code', 255)->nullable(); // varchar(255)
            $table->string('district_code', 255)->nullable(); // varchar(255)
            $table->string('code', 255)->nullable(); // varchar(255)
            $table->string('name_np', 255)->nullable(); // varchar(255)
            $table->string('name_en', 255)->nullable(); // varchar(255)
            $table->string('web_url', 255)->nullable(); // varchar(255)
            $table->integer('total_ward')->nullable(); // int4
            $table->string('area', 255)->nullable(); // varchar(255)
            $table->string('population', 255)->nullable(); // varchar(255)
            $table->string('lat', 255)->nullable(); // varchar(255)
            $table->string('lan', 255)->nullable(); // varchar(255)
            $table->boolean('status')->default(true); // bool, default true
            $table->unsignedBigInteger('local_body_type_id')->nullable(); // int8
            $table->unsignedBigInteger('created_by')->nullable(); // int8
            $table->unsignedBigInteger('updated_by')->nullable(); // int8
            $table->unsignedBigInteger('deleted_by')->nullable(); // int8
            $table->unsignedInteger('central_app_id')->nullable(); // int4

            // Indexes
            $table->index('province_code');
            $table->index('district_code');
            $table->index('local_body_type_id');
            $table->index('central_app_id');
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
        Schema::dropIfExists('local_bodies');
    }
};
