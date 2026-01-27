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
        Schema::create('business_packages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('reservations')->nullable();
            $table->string('reservations_label',512)->nullable();
            $table->string('contacts')->nullable();
            $table->string('contacts_label',512)->nullable();
            $table->boolean('favourites')->default(0);
            $table->string('favourites_label')->nullable();
            $table->string('price')->nullable();
            $table->string('annual')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('business_packages');
    }
};
