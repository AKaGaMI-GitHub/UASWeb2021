<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatapemiliksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datapemiliks', function (Blueprint $table) {
            $table->id('id_pemilik');
            $table->string('nama_pemilik');
            $table->string('jns_kelamin');
            $table->string('tmpt_lhr');
            $table->date('tgl_lhr');
            $table->string('alamat');
            $table->string('no_telp');
            $table->date('tgl_daftar');
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
        Schema::dropIfExists('datapemiliks');
    }
}
