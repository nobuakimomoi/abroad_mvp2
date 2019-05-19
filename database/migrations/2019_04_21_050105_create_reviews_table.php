<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            // Basic info
            $table->increments('id');
            $table->string('company_name');
            $table->string('company_id');
            $table->string('user_id');
            $table->string('employment_condition')->nullable();
            $table->string('enrollment_status')->nullable();
            $table->string('review_function_name')->nullable();
            $table->string('review_division')->nullable();
            $table->string('review_position')->nullable();
            // Ratting
            $table->integer('work_env_rate')->nullable();
            $table->integer('promotion_rate')->nullable();
            $table->integer('work_life_balance_rate')->nullable();
            $table->integer('c_and_b_rate')->nullable();
            $table->integer('gender_equality_rate')->nullable();
            $table->integer('growth_rate')->nullable();
            $table->integer('overtime')->nullable();
            $table->string('work_env')->nullable();
            $table->string('screening')->nullable();
            $table->string('promotion')->nullable();
            $table->string('growth')->nullable();
            $table->string('gender_equality')->nullable();
            $table->string('c_and_b')->nullable();
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
        Schema::dropIfExists('reviews');
    }
}
