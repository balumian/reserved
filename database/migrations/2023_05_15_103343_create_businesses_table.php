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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('name')->nullable();
            $table->string('residence_front',512)->nullable();
            $table->string('residence_back',512)->nullable();
            $table->string('passport',512)->nullable();
            $table->string('trade_license',512)->nullable();
            $table->string('license',512)->nullable();
            $table->string('vat',512)->nullable();
            $table->text('overview')->nullable();
            $table->integer('cover_photo')->nullable();
            $table->text('location')->nullable();
            $table->string('menu_pdf',512)->nullable();
            $table->string('capacity')->nullable();
            $table->enum('reservation_type',['1','2'])->nullable();
            $table->unsignedBigInteger('business_type_id')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
