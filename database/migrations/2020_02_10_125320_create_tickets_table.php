<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_status');
            $table->unsignedBigInteger('id_type');
            $table->unsignedBigInteger('id_category');
            $table->unsignedBigInteger('id_priority');
            $table->string('created_by');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_status')->references('id')->on('statuses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_type')->references('id')->on('types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_category')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_priority')->references('id')->on('priorities')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tickets');
    }
}
