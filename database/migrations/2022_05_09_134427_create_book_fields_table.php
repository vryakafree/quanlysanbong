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
        Schema::create('book_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('field_id');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->tinyInteger('paid');
            $table->integer('bill_cost');
            $table->index(['user_id','field_id']);
            $table->string('phone', 15);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_fields');
    }
};
