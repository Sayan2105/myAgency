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
        Schema::create('agencies', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('company_type');
            $table->string('instagram_url')->nullable();
            $table->string('website_url')->nullable();
            $table->string('location')->nullable();
            $table->string('specialization')->nullable();
            $table->unsignedInteger('followers')->nullable();

            $table->string('website_quality')->nullable();
            $table->string('priority')->default('medium');
            $table->string('status')->default('new');

            $table->timestamp('last_contacted_at')->nullable();
            $table->timestamp('follow_up_at')->nullable();

            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agencies');
    }
};
