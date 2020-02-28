<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelayanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelayanan', function (Blueprint $table) {
            $table->increments('id_pelayanan'); 
            $table->string('nama_pelayaan', 200);  
            $table->string('jenis_pelayanan',200); 
            $table->text('deskripsi_pelayaan'); 
            $table->integer('tarif_pelayanan'); 
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
