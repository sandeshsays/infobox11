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
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();
            $table->boolean('allow_index')->default(false); // allow_index (bool, default false)
            $table->boolean('allow_add')->default(false); // allow_add (bool, default false)
            $table->boolean('allow_edit')->default(false); // allow_edit (bool, default false)
            $table->boolean('allow_delete')->default(false); // allow_delete (bool, default false)
            $table->boolean('allow_show')->default(false); // allow_show (bool, default false)
            $table->bigInteger('role_id'); // role_id (int8)
            $table->bigInteger('menu_id'); // menu_id (int8
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_roles');
    }
};
