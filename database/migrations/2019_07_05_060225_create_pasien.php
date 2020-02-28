<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->increments('id_pasien');
            $table->text('no_rm');
            $table->string('nama_pasien', 200);
            $table->string('jenis_kelamin_pasien',200);
            $table->string('alamat_pasien', 200);
            $table->date('tgl_lahir_pasien');
            $table->string('umur', 200);
            $table->string('no_hp_pasien', 200);
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
