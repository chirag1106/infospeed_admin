<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id')->nullable();
            $table->string('emp_type')->nullable();
            $table->string('emp_name')->nullable();
            $table->string('emp_email')->nullable();
            $table->string('emp_phone')->nullable();
            $table->string('emp_address')->nullable();
            $table->string('emp_wages')->nullable();
            $table->string('emp_date')->nullable();
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
        Schema::dropIfExists('employes');
    }
}
