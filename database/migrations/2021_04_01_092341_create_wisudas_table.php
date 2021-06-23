<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWisudasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisudas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswas', 'id')->onDelete('cascade');
            $table->foreignId('periode_id')->constrained('periodes', 'id')->onDelete('cascade');
            $table->float('ipk');
            $table->string('judulskripsi');
            $table->string('dosenpembimbing1');
            $table->string('dosenpembimbing2')->nullable();
            $table->string('nohp');
            $table->string('pekerjaan')->nullable();
            $table->boolean('KW_toga')->default(1);
            $table->boolean('KW_samir')->default(1);
            $table->boolean('KW_bukualumni')->default(0);
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
        Schema::dropIfExists('wisudas');
    }
}
