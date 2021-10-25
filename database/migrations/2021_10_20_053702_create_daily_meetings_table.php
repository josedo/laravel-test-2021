<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_meetings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();
            $table->string('done')->nullable();
            $table->string('doing')->nullable();
            $table->string('blocking')->nullable();
            $table->string('todo')->nullable();
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
        Schema::dropIfExists('daily_meetings');
    }
}
