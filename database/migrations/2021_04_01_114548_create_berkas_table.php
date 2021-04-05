<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerkasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wisuda_id');
            $table->string('pasfoto');
            $table->string('scanktp');
            $table->string('bebasperpustakaan');
            $table->string('toeflcept');
            $table->string('buktiskripsi');
            $table->string('pengesahanskripsi');
            $table->string('pembayaranpendaftaran');

            $table->string('status_pasfoto')->default('pending');
            $table->string('status_scanktp')->default('pending');
            $table->string('status_bebasperpustakaan')->default('pending');
            $table->string('status_toeflcept')->default('pending');
            $table->string('status_buktiskripsi')->default('pending');
            $table->string('status_pengesahanskripsi')->default('pending');
            $table->string('status_pembayaranpendaftaran')->default('pending');

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
        Schema::dropIfExists('berkas');
    }
}
