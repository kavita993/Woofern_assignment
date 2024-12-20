<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('product_variant')->nullable(); // flowers or with_cake
            $table->decimal('price', 10, 2);
            $table->string('delivery_type'); // same_day, tomorrow, selected_date
            $table->string('delivery_slot')->nullable(); // Time slot
            $table->date('delivery_date')->nullable();
            $table->string('pincode');
            $table->string('country');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
};
