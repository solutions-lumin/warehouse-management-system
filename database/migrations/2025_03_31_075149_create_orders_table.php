<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('vendor_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->string('ordered_by');
            $table->time('order_time');
            $table->string('dispatched_to');
            $table->string('contact_number');
            $table->string('dispatch_location');
            $table->integer('total_boxes');
            $table->decimal('courier_weight', 10, 2);
            $table->decimal('chargeable_weight', 10, 2);
            $table->string('courier_mode');
            $table->decimal('rate', 10, 2);
            $table->decimal('total_amount', 10, 2);
            $table->string('tracking_number')->nullable();
            $table->string('tracking_status')->nullable();
            $table->string('challan_number')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
