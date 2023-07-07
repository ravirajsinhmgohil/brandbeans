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
        Schema::create('templatemasters', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->string('logoLeft');
            $table->string('logoBottom');
            $table->string('mobileLeft');
            $table->string('mobileBottom');
            $table->string('mobileFontsize');
            $table->string('mobileFontfamily');
            $table->string('webLeft');
            $table->string('webBottom');
            $table->string('webFontsize');
            $table->string('webFontfamily');
            $table->string('emailLeft');
            $table->string('emailBottom');
            $table->string('emailFontsize');
            $table->string('emailFontfamily');
            $table->string('locationLeft');
            $table->string('locationBottom');
            $table->string('locationFontsize');
            $table->string('locationFontfamily');
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
        Schema::dropIfExists('templatemasters');
    }
};
