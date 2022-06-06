<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsinged();
            $table->string('full_name')->nullable();
            $table->bigInteger('contact')->nullable();
            $table->bigInteger('emergency_contact')->nullable();
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            //$table->string('civilstatus')->nullable();
            $table->string('dob')->nullable();
            $table->bigInteger('nid')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            //$table->string('status')->nullable();
            $table->string('shift')->nullable();
            $table->string('avatar')->nullable();
            $table->string('salary')->nullable();
            $table->string('web')->nullable();
            $table->string('github')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('joining_date')->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->string('marital_status')->nullable();
            $table->longText('nid_photo')->nullable();
            $table->longText('cv')->nullable();
            $table->longText('certificate')->nullable();
            $table->integer('archived')->default('0');

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
        Schema::dropIfExists('employee_infos');
    }
}
