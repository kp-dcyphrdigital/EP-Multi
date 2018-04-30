<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('competition_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('telephone');
            $table->string('url');
            $table->boolean('approved')->default(false);
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
        Schema::dropIfExists('entries');
        // unlink('4d39d12b63a6c86dbec91c6f9b995400.jpg');
        array_map('unlink', glob( base_path() . "/storage/app/public/images/*.*"));
    }
}
