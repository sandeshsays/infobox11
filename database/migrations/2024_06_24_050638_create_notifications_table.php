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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->integer('fy_id')->nullable(); // fy_id (int4, nullable)
            $table->integer('client_id')->nullable(); // client_id (int4, nullable)
            $table->string('notify_date_np', 255); // notify_date_np (varchar, length 255)
            $table->string('notify_date_en', 255); // notify_date_en (varchar, length 255)
            $table->string('title_en', 255); // title_en (varchar, length 255)
            $table->string('title_np', 255); // title_np (varchar, length 255)
            $table->integer('notify_id')->nullable(); // notify_id (int4, nullable)
            $table->integer('notify_to_user_id')->nullable(); // notify_to_user_id (int4, nullable)
            $table->string('notify_url', 255); // notify_url (varchar, length 255)
            $table->bigInteger('notify_read_by')->nullable(); // notify_read_by (int8, nullable)
            $table->string('notify_type', 255); // notify_type (varchar, length 255)
            $table->string('notification_read_date_np', 255)->nullable(); // notification_read_date_np (varchar, length 255, nullable)
            $table->date('notification_read_date_en')->nullable(); // notification_read_date_en (date, nullable)
            $table->bigInteger('action_designation_id')->nullable(); // action_designation_id (int8, nullable)
            $table->bigInteger('action_user_id')->nullable(); // action_user_id (int8, nullable)
            $table->bigInteger('action_branch_id')->nullable(); // action_branch_id (int8, nullable)
            $table->bigInteger('action_ward_no')->nullable(); // action_ward_no (int8, nullable)
            $table->bigInteger('receiver_designation_id')->nullable(); // receiver_designation_id (int8, nullable)
            $table->bigInteger('receiver_branch_id')->nullable(); // receiver_branch_id (int8, nullable)
            $table->bigInteger('receiver_ward_no')->nullable(); // receiver_ward_no (int8, nullable)
            $table->bigInteger('notify_sub_id')->nullable(); // notify_sub_id (int8, nullable)
            $table->string('added_by_type', 255)->default('web'); // added_by_type (varchar, length 255, default 'web')
            $table->integer('ward_no')->nullable(); // ward_no (int4, nullable)
            $table->integer('branch_id')->nullable(); // branch_id (int4, nullable)
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
