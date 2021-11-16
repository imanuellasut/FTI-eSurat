<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_jenis_surats')->unsigned();
            $table->string('prihal');
            $table->date('tgl_pelaksanaan');
            $table->string('nama_mitra');
            $table->string('lokasi');
            $table->longText('isi_surat')->nullable();
            $table->longText('penutup_surat')->nullable();
            $table->enum('tipe_surat', ['masuk', 'keluar']);
            $table->enum('status', ['diterima', 'ditolak']);
            $table->string('pesan_status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surats');
    }
}
