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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('key', 1000)->nullable();
            $table->integer('user_id')->nullable();
            $table->string('user_name', 1000)->nullable();
            $table->string('task_name', 256)->nullable();
            $table->enum('status', [
                'новая',
                'в работе',
                'выполнена',
                'ошибка'
            ])->default('новая');
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
        Schema::dropIfExists('tasks');
    }
};
