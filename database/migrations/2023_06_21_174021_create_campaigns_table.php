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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('detail');
            $table->integer('userId');
            $table->string('price');
            $table->string('photo');
            $table->string('rule');
            $table->string('eligibleCriteria');
            $table->string('targetGender');
            $table->string('targetAgeGroup');
            $table->date('startDate');
            $table->date('endDate');
            $table->string('applyForLastDate');
            $table->string('task');
            $table->string('maxApplication');
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
        Schema::dropIfExists('campaigns');
    }
};
