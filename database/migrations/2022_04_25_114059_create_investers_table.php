<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investers', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('company_name');
            $table->string('position');
            $table->integer('investertag_id');
            $table->string('name');
            $table->string('email');
            $table->password()->nullable(false);
            $table->description('content', 191)->nullable(false);
            $table->hidden('content', 191)->nullable(false);
            $table->timestamps();

            $table->id()->autoIncrement();
            $table->string('name');
            $table->string('email');
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
        Schema::dropIfExists('investers');
    }
}
