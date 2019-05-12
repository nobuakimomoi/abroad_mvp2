<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('adminflag')->nullable();
            $table->boolean('reviewflag')->nullable();
            $table->rememberToken();
            $table->timestamps();
            
            //Resume Option
            // $table->string('status');
            // $table->string('school_type');
            // $table->string('school_name');
            // $table->string('college_of');
            // $table->string('department');
            // $table->string('bunri');
            // $table->string('expected_graduation');
            // $table->string('industory');
            // $table->string('function');
            // $table->string('current_salary');
            // $table->string('browsing_method');
            // $table->string('research_group');
            // $table->string('research_topic');
            // $table->string('intern_company_name');
            // $table->string('intern_company_period');
            // $table->string('intern_scope');
            // $table->string('pr_title');
            // $table->string('pr');
            // $table->string('company_name');
            // $table->string('function_name');
            // $table->string('division');
            // $table->string('position');
            // $table->string('user_gender');
            // $table->string('chatt_acceptance');
            // $table->string('year_entry');
            // $table->string('year_resignation');
            // $table->string('work_location');
            // $table->string('work_scope');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
