<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('username', 32);
            $table->string('secpassword', 64);
            $table->string('password', 64);
            $table->string('rowpass', 32)->nullable();
            $table->boolean('trytocard')->default(0);
            $table->boolean('changepwdret')->default(0);
            $table->unsignedTinyInteger('active')->default(1);
            $table->integer('LockPassword')->default(0);
            $table->boolean('trytohack')->default(0);
            $table->boolean('newlocked')->default(0);
            $table->boolean('locked')->default(0);
            $table->integer('LastLoginIP')->default(0);
            $table->integer('PasspodMode')->default(0);
            $table->string('email', 64);
            $table->integer('cmnd');
            $table->date('dob')->nullable();
            $table->bigInteger('coin')->default(0);
            $table->bigInteger('dateCreate')->nullable();
            $table->dateTime('lockedTime')->nullable();
            $table->unsignedBigInteger('testcoin')->default(0);
            $table->unsignedBigInteger('lockedCoin')->default(0);
            $table->integer('bklactivenew')->default(0);
            $table->integer('bklactive')->default(0);
            $table->integer('nExtpoin1')->default(0);
            $table->integer('nExtpoin2')->default(0);
            $table->integer('nExtpoin4')->default(0);
            $table->integer('nExtpoin5')->default(0);
            $table->integer('nExtpoin6')->default(0);
            $table->integer('nExtpoin7')->default(0);
            $table->integer('scredit')->default(0);
            $table->integer('nTimeActiveBKL')->default(0);
            $table->integer('nLockTimeCard')->default(0);
            $table->unsignedBigInteger('history_add_coin')->default(0);
            $table->string('ref', 255)->nullable();
            $table->string('refer', 255)->nullable();
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account');
    }
};

