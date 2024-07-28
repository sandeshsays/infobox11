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
        Schema::create('app_clients', function (Blueprint $table) {
            $table->id();
            $table->string('web_url', 255)->nullable(); // varchar(255)
            $table->string('api_web_url', 255)->nullable(); // varchar(255)
            $table->unsignedInteger('api_client_id')->nullable(); // int4
            $table->unsignedInteger('local_body_mapping_id')->nullable(); // int4
            $table->boolean('status')->default(true); // bool, default true
            $table->string('description', 255)->nullable(); // varchar(255)
            $table->unsignedInteger('created_by')->nullable(); // int4
            $table->timestamp('created_on')->nullable(); // timestamp
            $table->unsignedInteger('updated_by')->nullable(); // int4
            $table->timestamp('updated_on')->nullable(); // timestamp
            $table->unsignedInteger('deleted_by')->nullable(); // int4
            $table->timestamp('deleted_on')->nullable(); // timestamp
            $table->boolean('is_deleted')->default(false); // bool, default false
            $table->unsignedInteger('deleted_uq_code')->nullable(); // int4
            $table->unsignedInteger('document_store_size')->nullable(); // int4
            $table->string('size_type', 255)->nullable(); // varchar(255)
            $table->string('display_order', 255)->nullable(); // varchar(255)
            $table->string('client_logo', 255)->nullable(); // varchar(255)
            $table->boolean('is_client_logo')->default(false); // bool, default false
            $table->boolean('is_client_slogan_logo')->default(false); // bool, default false
            $table->text('client_slogan')->nullable(); // text
            $table->string('client_slogan_logo', 255)->nullable(); // varchar(255)
            $table->string('code', 255)->nullable(); // varchar(255)
            $table->string('name_en', 255)->nullable(); // varchar(255)
            $table->string('name_np', 255)->nullable(); // varchar(255)
            $table->unsignedInteger('central_app_client_id')->nullable(); // int4

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_clients');
    }
};
