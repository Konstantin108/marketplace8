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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->integer('table_id');
            $table->integer('dealer_id_atr')->nullable();
            $table->string('dealer,')->nullable();
            $table->integer('category_id_atr')->nullable();
            $table->string('category')->nullable();
            $table->string('type')->nullable();
            $table->string('year')->nullable();
            $table->integer('brand_id_atr')->nullable();
            $table->string('brand')->nullable();
            $table->integer('model_id_atr')->nullable();
            $table->string('model')->nullable();
            $table->integer('generation_id_atr')->nullable();
            $table->string('generation')->nullable();
            $table->integer('bodyConfiguration_id_atr')->nullable();
            $table->string('bodyConfiguration')->nullable();
            $table->integer('modification_id')->nullable();
            $table->string('modification')->nullable();
            $table->string('engineType')->nullable();
            $table->string('engineVolume')->nullable();
            $table->string('enginePower')->nullable();
            $table->string('bodyType')->nullable();
            $table->integer('bodyDoorCount')->nullable();
            $table->string('bodyColor')->nullable();
            $table->string('bodyColorMetallic')->nullable();
            $table->string('driveType')->nullable();
            $table->string('gearboxType')->nullable();
            $table->string('steeringWheel')->nullable();
            $table->string('mileage')->nullable();
            $table->string('mileageUnit')->nullable();
            $table->string('price')->nullable();
            $table->string('specialOffer')->nullable();
            $table->string('availability')->nullable();
            $table->string('ptsType')->nullable();
            $table->integer('photoCount')->nullable();
            $table->integer('ownersCount')->nullable();
            $table->text('description')->nullable();
            $table->string('vehicleCondition')->nullable();
            $table->string('acquisitionSource')->nullable();
            $table->string('acquisitionDate')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
};
