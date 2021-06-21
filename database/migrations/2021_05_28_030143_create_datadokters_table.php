<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatadoktersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datadokters', function (Blueprint $table) {
            $table->id('id_dokter');
            $table->string('nama_dokter');
            $table->string('tmpt_lhr');
            $table->date('tgl_lhr');
            $table->string('jns_kelamin','20');
            $table->string('alamat');
            $table->string('no_telp','20');
            $table->string('agama','20');
            $table->string('status','20');
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
        Schema::dropIfExists('datadokters');
    }
}
