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
            $table->string('fullName');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phoneNumber');
            $table->string('profileImagePath')->nullable();
            $table->string('livingAddress')->nullable();
            $table->string('profession')->nullable();
            $table->string('statusMatrimonial')->nullable();
            $table->string('birthday')->nullable();
            $table->string('nationalCardID')->nullable();
            $table->string('revenuAnnuel')->nullable();
            $table->rememberToken();
            $table->boolean('admin')->default(false);
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
