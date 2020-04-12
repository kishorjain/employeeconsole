<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeeWebHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EmployeeWebHistory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreign('ip_address')->references('ip_address')->on('employees');
            $table->string('ip_address',100);
            $table->string('url');
            $table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            
            
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('EmployeeWebHistory');
    }
}
