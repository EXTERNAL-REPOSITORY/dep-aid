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
        Schema::create('dispensed_medicines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medicine_id')->references('id')->on('inventory');
            $table->foreignId('patient_form_id')->reference('id')->on('patient_form')->comment('person got the medicine');
            $table->integer('quantity')->default(0);
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('dispensed_medicines');
    }
};
