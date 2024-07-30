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
        Schema::create('mst_fiscal_year', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('client_id')->nullable(); // int4
            $table->string('code', 255)->nullable(); // varchar(255)
            $table->string('date_from_bs', 255)->nullable(); // varchar(255)
            $table->date('date_from_ad')->nullable(); // date
            $table->string('date_to_bs', 255)->nullable(); // varchar(255)
            $table->string('date_to_ad', 255)->nullable(); // varchar(255)
            $table->text('description')->nullable(); // text
            $table->boolean('status')->default(true); // bool, default true
            $table->unsignedInteger('created_by')->nullable(); // int4
            $table->timestamp('created_on')->nullable(); // timestamp
            $table->unsignedInteger('updated_by')->nullable(); // int4
            $table->timestamp('updated_on')->nullable(); // timestamp
            $table->unsignedInteger('deleted_by')->nullable(); // int4
            $table->timestamp('deleted_on')->nullable(); // timestamp
            $table->boolean('is_deleted')->default(true); // bool, default true
            $table->unsignedInteger('deleted_uq_code')->nullable(); // int4
            $table->unsignedInteger('client_ward')->nullable(); // int4
            // Indexes
            $table->index('client_id');
            $table->index('status');
            $table->index('created_by');
            $table->index('updated_by');
            $table->index('deleted_by');
            $table->index('client_ward');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_fiscal_years');
    }
};
