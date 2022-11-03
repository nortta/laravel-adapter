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
        Schema::create('nortta_pages', function (Blueprint $table) {
            $table->id();
            $table->uuid()->index();
            $table->string('title');
            $table->string('slug')->index();
            $table->text('body');
            $table->uuid('parent_id')->index()->nullable();
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
        Schema::dropIfExists('nortta_pages');
    }
};
