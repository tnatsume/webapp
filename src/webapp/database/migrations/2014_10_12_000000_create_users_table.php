<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_token',64)->unique();
            $table->integer('user_kbn')->default(0)->comment('0:一般ユーザー、50:出品者,99:管理者');
            $table->string('name')->nullable();
            $table->string('name_pronunciation')->nullable();  
            $table->date('birthday')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->boolean('identification_flag')->default(false)->comment('true:本人確認済み');
            $table->string('email', 191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('email_verified')->default(0);
            $table->string('email_verify_token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
