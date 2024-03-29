<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clientsadmn');
            $table->string('clientsname');
            $table->string('sponsorsidnumber');
            $table->string('sponsorsname');
            $table->string('station');
            $table->date('expectedexitdate')->nullable();
            $table->date('exitdate')->nullable();
            $table->string('exitcomments')->nullable();
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
        Schema::dropIfExists('admissions');
    }
}
