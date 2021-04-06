<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelaksanaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelaksanaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_id');
            $table->date('start_pendaftaran');
            $table->date('end_pendaftaran');
            $table->date('start_verifikasi');
            $table->date('end_verifikasi');
            $table->date('start_pengambilan');
            $table->date('end_pengambilan');
            $table->date('wisuda');
            $table->date('start_pengembalian');
            $table->date('end_pengembalian');
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
        Schema::dropIfExists('pelaksanaans');
    }
}
