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
        Schema::create('influencer_profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('userId');
            $table->string('contactNo')->nullable();
            $table->string('profilePhoto')->nullable();
            $table->longText('address')->nullable();
            $table->integer('categoryId');
            $table->string('status');
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
        Schema::dropIfExists('influencer_profiles');
    }
};
