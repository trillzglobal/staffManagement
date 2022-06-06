<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->integer('idno')->unsinged();
            $table->string('employee')->nullable();
            $table->string('type')->nullable();
            $table->string('leavefrom')->nullable();
            $table->string('leaveto')->nullable();
            $table->string('reason')->nullable();
            $table->string('status')->nullable();
            $table->string('comment')->nullable();
            $table->integer('archived')->unsinged();
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
        Schema::dropIfExists('leaves');
    }
}