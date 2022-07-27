<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsToFantasyGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fantasy_groups', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('total_no_of_member')->after('group_logo')->default(0);
            $table->unsignedBigInteger('group_points')->after('total_no_of_member')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fantasy_groups', function (Blueprint $table) {
            //
        });
    }
}
