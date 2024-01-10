<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToBookVotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book_vote', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('book_id'); // Add the column after the 'id' column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_vote', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
