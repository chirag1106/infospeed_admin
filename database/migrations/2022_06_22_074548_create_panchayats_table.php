<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanchayatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panchayats', function (Blueprint $table) {
            $table->id();
            $table->string('loksabha_id')->nullable();
            $table->string('vidhansabha_id')->nullable();
            $table->string('block_id')->nullable();
            $table->string('panchayat_choosing')->nullable();
            $table->string('panchayat_name')->nullable();
            $table->string('panchayat_status')->default(1);
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
        Schema::dropIfExists('panchayats');
    }
}
