<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('cus_name');
            $table->string('cus_email');
            $table->string('cus_phone');
            $table->json('cus_address');
            $table->double('amount', 20, 2);
            $table->string('currency')->default('BDT');
            $table->string('product_name');
            $table->longText('product_description');
            $table->enum('status', ['Pending', 'Paid', 'Fulfilled', 'Refund'])->default('Pending');
            $table->json('product_attributes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}