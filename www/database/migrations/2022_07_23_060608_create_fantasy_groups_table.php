<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFantasyGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fantasy_groups', function (Blueprint $table) {
            $table->id();
            $table->string('group_name');
            $table->string('group_type');
            $table->string('group_intro')->nullable();
            $table->string('group_logo')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->boolean('is_activate')->default(1);
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
        Schema::dropIfExists('fantasy_groups');
    }
}
