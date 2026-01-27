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
        Schema::create('perks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_id')->nullable();
            $table->text('title')->nullable();
            $table->unsignedBigInteger('emirate_id')->nullable();
            $table->unsignedBigInteger('area_id')->nullable();
            $table->string('expiry')->nullable();
            $table->enum('type',['perks','offers'])->nullable();
            $table->boolean('status')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perks');
    }
};
