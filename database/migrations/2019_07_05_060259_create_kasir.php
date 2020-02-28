<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKasir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasir', function (Blueprint $table) {
            $table->increments('id_kasir');
            $table->integer('id_user');
            $table->string('nama', 200);
            $table->string('jenis_kelamin',200);
            $table->string('alamat', 200);
            $table->string('no_hp', 200);
            $table->string('tgl_lahir', 200); 
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
        //
    }
}
