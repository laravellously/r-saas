<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('symbol');
            $table->string('address')->unique()->index();
            $table->foreignIdFor(User::class);
            $table->enum('symbol_position', ['BEFORE', 'AFTER']);
            $table->enum('wallet_type', ['FIAT', 'CRYPTO']);
            $table->integer('wallet_decimal')->default(2);
            $table->decimal('balance', 20, 10)->default(0);
            $table->integer('max_withdrawable_amount')->nullable();
            $table->integer('min_withdrawable_amount')->default(0);
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
        Schema::dropIfExists('wallets');
    }
};
