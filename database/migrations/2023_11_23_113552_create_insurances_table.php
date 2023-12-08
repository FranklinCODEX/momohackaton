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
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('insurance_type_id');
            $table->foreign('insurance_type_id')->references('id')->on('type_insurances');
            $table->string('date_limite');
            $table->string('insuranceFrequency');
            $table->string('insuranceDuration');
            $table->string('renouvellement');
            $table->string('dateRenouvellement');
            $table->string('dateDebutContrat');
            $table->string('fullName');
            $table->string('email');
            $table->string('phoneNumber');
            $table->string('birthday');
            $table->string('profession');
            $table->string('statutionMatrimoniale');
            $table->string('cardID');
            $table->string('revenuAnnuel');
            $table->string('etat')->default("En cours");
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
        Schema::dropIfExists('insurances');
    }
};
