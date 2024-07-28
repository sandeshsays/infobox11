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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id')->nullable(); // client_id (int4, nullable)
            $table->string('name_en', 255); // name_en (varchar, length 255)
            $table->string('name_np', 255); // name_np (varchar, length 255)
            $table->text('details')->nullable(); // details (text, nullable)
            $table->boolean('status')->default(true); // status (bool, default true)
            $table->string('role_level', 255)->nullable(); // role_level (varchar, length 255)
            $table->string('role_module', 255)->nullable(); // role_module (varchar, length 255)
            $table->bigInteger('created_by')->nullable(); // created_by (int8, nullable)
            $table->bigInteger('updated_by')->nullable(); // updated_by (int8, nullable)
            $table->bigInteger('deleted_by')->nullable(); // deleted_by (int8, nullable)
            $table->integer('ward_no')->nullable(); // ward_no (int4, nullable)
            $table->integer('branch_id')->nullable(); // branch_id (int4, nullable)
            $table->boolean('is_system_admin_role')->default(false); // is_system_admin_role (bool, default false)
            $table->boolean('is_client_role')->default(false); // is_client_role (bool, default false)
            $table->boolean('is_branch_role')->default(false); // is_branch_role (bool, default false)
            $table->boolean('is_ward_role')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
