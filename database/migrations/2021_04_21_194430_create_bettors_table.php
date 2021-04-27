<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBettorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bettors', function (Blueprint $table) {
            $table->id();
            $table->string('bettor_name', 100);
            $table->string('bettor_surname', 150);
            $table->decimal('bet', 7,2);
            $table->integer('horse_id')->unsigned();
            $table->foreign('horse_id')->references('id')->on('horses');
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
        Schema::dropIfExists('bettors');
    }
}
