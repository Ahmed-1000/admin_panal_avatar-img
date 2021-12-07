<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminslistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminslists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('pass');
            $table->string('avatars')->nullable();
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
        Schema::dropIfExists('adminslists');

        Schema::create('adminslists', function (Blueprint $table) {

            $table->dropColumn('avatars');
        }
    }
}
