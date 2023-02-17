<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use TCG\Voyager\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('plan_id')->default('');
            $table->foreignIdFor(Role::class);
            $table->string('slug')->unique();
            $table->enum('interval', ['month', 'year']);
            $table->decimal('price', 6, 2);
            $table->boolean('active')->default(true);
            $table->integer('customers_limit')->nullable();
            $table->integer('transactions_limit')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('plans');
    }
};
