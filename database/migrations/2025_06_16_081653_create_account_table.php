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
        Schema::create('account', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('secpassword')->nullable();
            $table->string('password');
            $table->string('rowpass')->nullable();
            $table->integer('trytocard')->default(0);
            $table->integer('changepwdret')->default(0);
            $table->boolean('active')->default(true);
            $table->boolean('LockPassword')->default(false);
            $table->integer('trytohack')->default(0);
            $table->boolean('newlocked')->default(false);
            $table->boolean('locked')->default(false);
            $table->string('LastLoginIP')->nullable();
            $table->boolean('PasspodMode')->default(false);
            $table->string('email')->nullable();
            $table->string('cmnd')->nullable();
            $table->date('dob')->nullable();
            $table->decimal('coin', 20, 2)->default(0);
            $table->timestamp('dateCreate')->useCurrent();
            $table->timestamp('lockedTime')->nullable();
            $table->decimal('testcoin', 20, 2)->default(0);
            $table->decimal('lockedCoin', 20, 2)->default(0);
            $table->boolean('bklactivenew')->default(false);
            $table->boolean('bklactive')->default(false);
            $table->integer('nExtpoin1')->default(0);
            $table->integer('nExtpoin2')->default(0);
            $table->integer('nExtpoin4')->default(0);
            $table->integer('nExtpoin5')->default(0);
            $table->integer('nExtpoin6')->default(0);
            $table->integer('nExtpoin7')->default(0);
            $table->decimal('scredit', 20, 2)->default(0);
            $table->timestamp('nTimeActiveBKL')->nullable();
            $table->timestamp('nLockTimeCard')->nullable();
            $table->text('history_add_coin')->nullable();
            $table->unsignedBigInteger('ref')->nullable();
            $table->string('refer')->nullable();
            
            $table->foreign('ref')->references('id')->on('users')->onDelete('set null');
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
