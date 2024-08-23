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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parcel_id')->nullable();
            $table->string('item')->nullable();
            $table->string('weight')->nullable();
            $table->string('cargo_type')->nullable();
            $table->string('amount')->nullable();
            $table->string('additional_charges')->nullable();
            $table->timestamps();

            $table->foreign('parcel_id')->references('id')->on('parcels')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
