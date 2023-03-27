<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname', 50);
            $table->string('lname', 50);
            $table->string('email', 100)->unique();
            $table->string('personal_code', 12)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('city', 50)->nullable();
            $table->string('street', 50)->nullable();
            $table->string('house_number', 10)->nullable();
            $table->tinyinteger('role_id');
            $table->string('profila_bilde')->default('default.jpg');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
};
