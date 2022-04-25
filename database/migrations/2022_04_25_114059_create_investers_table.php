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
            $table->string('name')->nullable(false);
            $table->string('email')->nullable(false);
            $table->password()->nullable(false);
            $table->string('description');
            $table->boolean('hidden');
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
