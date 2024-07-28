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
        Schema::create('system_settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_name', 255)->nullable(); // varchar(255)
            $table->string('app_name_np', 255)->nullable(); // varchar(255)
            $table->string('app_short_name', 255)->nullable(); // varchar(255)
            $table->string('app_short_name_np', 255)->nullable(); // varchar(255)
            $table->string('app_logo', 255)->nullable(); // varchar(255)
            $table->boolean('login_attempt_required')->default(false); // bool, default false
            $table->unsignedInteger('login_attempt_limit')->nullable(); // int4
            $table->boolean('login_captcha_required')->default(false); // bool, default false
            $table->boolean('forget_password_required')->default(true); // bool, default true
            $table->string('login_title', 255)->nullable(); // varchar(255)
            $table->string('login_title_np', 255)->nullable(); // varchar(255)
            $table->unsignedInteger('session_expire_time')->nullable(); // int4
            $table->unsignedInteger('api_key_expire_time')->nullable(); // int4
            $table->unsignedInteger('client_id')->nullable(); // int4
            $table->unsignedInteger('created_by')->nullable(); // int4
            $table->unsignedInteger('updated_by')->nullable(); // int4
            $table->unsignedInteger('deleted_by')->nullable(); // int4

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_settings');
    }
};
