<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_levels', function (Blueprint $table) {
            $table->id();
            $table->string('level_name');
            $table->decimal('amount', 5,2);
            $table->string('membership_fee')->nullable();
            $table->string('eight_prize_pool')->nullable();
            $table->string('level_prize_pool')->nullable();
            $table->string('credit_card_processing_fee')->nullable();
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
        Schema::dropIfExists('game_levels');
    }
}
