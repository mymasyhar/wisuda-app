<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;
    protected $table = 'berkas';
    protected $guarded = [];

    public function status()
    {
        $result = 'pending';
        if (
            $this->status_pasfoto == 'acc' &&
            $this->status_scanktp == 'acc' &&
            $this->status_bebasperpustakaan == 'acc' &&
            $this->status_toeflcept == 'acc' &&
            $this->status_buktiskripsi == 'acc' &&
            $this->status_pengesahanskripsi == 'acc' &&
            $this->status_pembayaranpendaftaran == 'acc'
        ) {
            $result = 'acc';
        } else if (
            $this->status_pasfoto == 'revisi' ||
            $this->status_scanktp == 'revisi' ||
            $this->status_bebasperpustakaan == 'revisi' ||
            $this->status_toeflcept == 'revisi' ||
            $this->status_buktiskripsi == 'revisi' ||
            $this->status_pengesahanskripsi == 'revisi' ||
            $this->status_pembayaranpendaftaran == 'revisi'
        ) {
            $result = 'revisi';
        }
        return $result;
    }
}
