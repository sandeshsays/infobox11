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
        Schema::table('users', function (Blueprint $table) {
            $table->string('mobile_no')->nullable();
            $table->string('login_user_name')->nullable();
            $table->text('address')->nullable();
            $table->text('image')->nullable();
            $table->text('image_path')->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('block_status')->nullable();
            $table->boolean('is_user_switch_role')->nullable();
            $table->string('user_module')->nullable();
            $table->string('ward_no')->nullable();
            $table->integer('branch_id')->nullable();
            $table->integer('emp_id')->nullable();
            $table->integer('rep_id')->nullable();
            $table->boolean('is_employee_user')->nullable();
            $table->boolean('is_branch_user')->nullable();
            $table->boolean('is_ward_user')->nullable();
            $table->string('signature_pin')->nullable();
            $table->text('signature_image')->nullable();
            $table->text('signature_path')->nullable();
            $table->unsignedInteger('created_by')->nullable(); 
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
