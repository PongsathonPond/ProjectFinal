<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('location_Name');
            $table->string('location_Building');
            $table->string('location_Floor');
            $table->string('location_Image');
            $table->string('accommodate_people');
            $table->string('location_Cost');
            $table->string('area');
            $table->string('location_Type');
            $table->timestamps();
        });

        Schema::table('locations', function (Blueprint $table) {
            $table->renameColumn('id', 'location_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
