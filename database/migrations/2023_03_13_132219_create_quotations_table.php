<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('insurance_company_id');
            $table->integer('insurance_type');
            $table->float('car_value');
            $table->integer('personal_accident_benefits_for_driver');
            $table->integer('personal_accident_benefits_for_passenger');
            $table->integer('road_side_assistance_services');
            $table->integer('rent_a_car');
            $table->string('extra_information_inputs');
            $table->string('price');
            $table->string('vat');
            $table->string('total');
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
        Schema::dropIfExists('quotations');
    }
}
