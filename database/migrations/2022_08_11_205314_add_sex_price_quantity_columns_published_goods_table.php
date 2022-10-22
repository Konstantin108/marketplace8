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
        Schema::table('publishedGoods', function (Blueprint $table) {
            $table->enum('sex', [
                'М',
                'Ж',
            ])->default('М');
            $table->string('price_quantity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('publishedGoods', function (Blueprint $table) {
            $table->dropColumn('sex', 'price_quantity');
        });
    }
};
