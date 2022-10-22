<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->id();
            $table->integer('table_id');
            $table->string('name', 1000)->nullable();
            $table->integer('price')->nullable();
            $table->string('info', 1000)->nullable();
            $table->integer('counter')->nullable();
            $table->enum('category', [
                'Аксессуары',
                'Сумки',
                'Джинсовая ткань',
                'Толстовки с капюшоном и свитера',
                'Куртки и пальто',
                'Брюки',
                'Поло',
                'Рубашки',
                'Обувь',
                'Шорты',
                'Свитера и трикотаж',
                'Футболки'
            ])->default('Аксессуары');
            $table->string('brand', 1000)->nullable();
            $table->string('designer', 1000)->nullable();
            $table->enum('size', [
                'XXS',
                'XS',
                'S',
                'M',
                'L',
                'XL',
                'XXL'
            ])->default('XXS');
            $table->enum('sale', [
                1,
                0
            ])->default(0);
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
        Schema::dropIfExists('goods');
    }
};
