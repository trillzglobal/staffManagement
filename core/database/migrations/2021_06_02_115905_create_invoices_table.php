<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('list_price')->nullable();
            $table->string('date')->nullable();
            $table->string('invoiceto')->nullable();
            $table->string('contact')->nullable();
            $table->integer('payment_status')->nullable();
            $table->double('due')->nullable();
            $table->double('partial')->nullable();
            $table->double('total')->nullable();

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
        Schema::dropIfExists('invoices');
    }
}
