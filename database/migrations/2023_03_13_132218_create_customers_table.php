<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->integer('car_make_id');
            $table->integer('car_model_id');
            $table->integer('year');
            $table->integer('color_id');
            $table->string('phone_number')->unique();;
            $table->string('email')->unique();
            $table->integer('country_id');
            $table->integer('city_id');
            $table->integer('created_by_id')->default(NULL);  
            $table->integer('updated_by_id')->default(NULL);  
            $table->integer('created_portal')->default(NULL); 
            $table->integer('updated_portal')->default(NULL); 
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
        Schema::dropIfExists('customers');
    }
}
