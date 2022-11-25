<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villages', function (Blueprint $table) {
            $table->id();
            $table->string('loksabha_id')->nullable();
            $table->string('vidhansabha_id')->nullable();
            $table->string('block_id')->nullable();
            $table->string('panchayat_id')->nullable();
            $table->string('village_choosing')->nullable();
            $table->string('village_name')->nullable();
            $table->string('village_status')->default(1);
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
        Schema::dropIfExists('villages');
    }
}
