<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVidhanSabhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vidhan_sabhas', function (Blueprint $table) {
            $table->id();
            $table->string('loksabha_id')->nullable();
            $table->string('vs_name')->nullable();
            $table->string('vidhan_status')->default(1);
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
        Schema::dropIfExists('vidhan_sabhas');
    }
}
