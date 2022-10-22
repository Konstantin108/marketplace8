<?php

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
            $table->unsignedBigInteger('user_id');
            $table->integer('count');
            $table->integer('sum');
            $table->string('goods', 255)->nullable();
            $table->enum('status', [
                'ожидает подтверждения',
                'сборка заказа',
                'заказ в пути',
                'заказ ожидает выдачи',
                'заказ выполнен',
                'заказ отменён',
            ])->default('ожидает подтверждения');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
