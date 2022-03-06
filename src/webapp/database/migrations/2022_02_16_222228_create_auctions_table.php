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
            $table->string('auction_token', 64)->unique();
            $table->string('user_token')->nullable();
            $table->integer('auction_kbn')
                ->default(0)
                ->comment('0:オークション,1:抽選券');
            $table->string('title');
            $table->datetime('Deadline_date')->commnet('締切日時');
            $table->datetime('Calling_date')->comment('電話日時');
            
            $table->text('situation')->nullabele();
            $table->integer('value')->nullable()->comment('抽選券の値段');
            $table->boolean('return_gift_flg')->default(false)->comment('返礼品の有無 1:あり,0:なし');
            $table->text('keyword')->comment('検索用キーワード');
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
