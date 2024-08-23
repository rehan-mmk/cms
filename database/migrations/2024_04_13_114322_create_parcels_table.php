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
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->string('TrackingId')->unique();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->string('SenderName')->nullable();
            $table->string('SenderContact')->nullable();
            $table->string('RecieverName')->nullable();
            $table->string('RecieverAddress')->nullable();
            $table->string('RecieverContact')->nullable();
            $table->string('PickupBranchId')->nullable();
            $table->string('ProcessedBranchId')->nullable();
            $table->string('PaymentStatus')->nullable();
            $table->string('ParcelImage')->nullable();
            $table->string('RecieverSignature')->nullable();
            $table->timestamp('SignatureDate')->nullable();
            $table->timestamps();

            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcels');
    }
};
