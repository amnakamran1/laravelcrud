<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id('student_id');
            $table->string('name' , 30);
            $table->string('email' , 30);
           // $table->integer('customer_phone' , 30);
            $table->text('address' , 30);
            $table->string('city' , 30);
          //  $table->string('date_of_birth');
            $table->enum('gender',["M","F","O"])->nullable();
//$table->string('customer_image')->nullable();
            $table->string('password');
            $table->integer('points');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('students');
    }
};
