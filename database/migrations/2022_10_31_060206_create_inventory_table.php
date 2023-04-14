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
        Schema::create('inventory', function (Blueprint $table) {
            $table->id();
            $table->string('medicine_name')->nullable();
            $table->string('brand')->nullable();
            $table->integer('beginning_balance')->nullable();
            $table->integer('stock_balance')->nullable();
            $table->integer('reorder_level')->nullable();
            $table->dateTime('manufacturer_date')->nullable();
            $table->dateTime('expiration_date')->nullable();
            $table->string('type')->nullable();
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
        Schema::dropIfExists('inventory');
    }
};
