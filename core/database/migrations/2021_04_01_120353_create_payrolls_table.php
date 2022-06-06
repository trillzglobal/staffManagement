<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->integer('reference')->nullable();
            $table->double('salary')->nullable();
            $table->double('total_salary')->nullable();
            $table->double('deduction')->nullable();
            $table->double('allowance')->nullable();
            $table->double('bonus')->nullable();
            $table->string('fromdate')->nullable();
            $table->string('todate')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->integer('attendance_count')->nullable();
            $table->integer('leaves')->nullable();
            $table->integer('absent')->nullable();
            $table->integer('approve_key')->nullable();
            $table->string('comment')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('payrolls');
    }
}
