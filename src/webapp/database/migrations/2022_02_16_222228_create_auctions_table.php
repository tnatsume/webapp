<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('auction of call')
                ->default(0)
                ->comment('0:オークション,1:抽選券');
            $table->string('title');
            $table->text('situation')->nullabele();
            $table->datetime('Deadline_date');
            $table->datetime('Calling_date');
            $table->integer('value')->nullable()->comment('抽選券の値段');
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
        Schema::dropIfExists('auctions');
    }
}
