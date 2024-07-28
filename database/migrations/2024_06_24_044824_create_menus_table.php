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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parent_id')->nullable(); 
            $table->string('menu_name', 255); 
            $table->string('menu_name_np', 255); 
            $table->string('menu_controller', 255); 
            $table->string('menu_link', 255); 
            $table->string('menu_icon', 255); 
            $table->boolean('menu_status')->default(true); 
            $table->boolean('action_module_status')->default(false); 
            $table->integer('menu_order'); 
            $table->bigInteger('created_by')->nullable(); 
            $table->bigInteger('updated_by')->nullable(); 
            $table->bigInteger('deleted_by')->nullable(); 
            $table->string('menu_module', 255)->nullable(); 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
