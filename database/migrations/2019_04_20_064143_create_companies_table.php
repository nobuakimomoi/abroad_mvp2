<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            // Basic info
            $table->increments('id');
            $table->string('company_name');
            $table->string('company_namekana');
            $table->string('company_photo')->nullable();
            $table->string('company_logo');
            $table->string('size');
            $table->string('hqAddress');
            $table->string('companyType');
            $table->integer('foundedYear');
            $table->string('industry');
            $table->string('description');
            $table->string('companyURL');
            $table->timestamps();
            // Option
            $table->string('revenue')->nullable();
            $table->integer('internationalWorkersPercentage')->nullable();
            $table->integer('pyHiringResult')->nullable();
            $table->integer('menWomenRatio')->nullable();
            $table->string('japaneselevel')->nullable();
            $table->string('hiringReason')->nullable();
            $table->string('persona')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
