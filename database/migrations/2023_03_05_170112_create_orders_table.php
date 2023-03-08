<?php

use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('contact');
            $table->string('phone');
            $table->enum('status', [Order::PENDIENTE, Order::RECIBIDO, Order::ENVIADO, Order::ENTREGADO, Order::ANULADO])->default(Order::PENDIENTE);
            $table->enum('envio_type', [1, 2]);
            $table->float('shipping_cost');
            $table->float('total');
            $table->json('content');
            $table->foreignId('department_id')->references('id')->on('departments')->nullable();
            $table->foreignId('city_id')->references('id')->on('cities')->nullable();
            $table->foreignId('district_id')->references('id')->on('districts')->nullable();
            $table->string('address')->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
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
};
