<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssesment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assesment', function (Blueprint $table) {
            $table->increments('id_assesment');
            $table->integer('id_fisioterapi'); 
            $table->integer('id_pelayanan'); 
            $table->datetime('tgl_terapi'); 
            $table->text('keluhan'); 
            $table->text('riwayat_keluhan'); 
            $table->text('keterbatasan_gerakan'); 
            $table->text('tissue_impairment'); 
            $table->text('pemeriksaan_spesifik'); 
            $table->text('problem_fisioterapi'); 
            $table->text('diagnosa_fisioterapi')->nulable(); 
            $table->text('tindakan_fisioterapi')->nulable(); 
            $table->text('inspeksi_statis')->nulable(); 
            $table->text('catatan_khusus')->nulable(); 
            $table->text('participation_restriction')->nulable(); 
            $table->text('activity_limitations')->nulable(); 
            $table->text('evaluasi')->nulable(); 
            $table->text('inspeksi_dinamis')->nulable(); 
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
