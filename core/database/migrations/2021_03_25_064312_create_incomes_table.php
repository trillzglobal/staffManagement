<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file_book_holder');
            $table->string('memo_no');
            $table->string('client_name');
            $table->string('client_type');
            $table->string('payment_by');
            $table->integer('transection_id');
            $table->date('date');
            $table->integer('quantity');
            $table->float('price');
            $table->float('total_price');
            $table->string('received_by');
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
        Schema::dropIfExists('incomes');
    }
}
