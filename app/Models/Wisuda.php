<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisuda extends Model
{
    use HasFactory;
    protected $table = 'wisudas';
    protected $guarded = [];

    public function berkas()
    {
        return $this->hasOne(Berkas::class, 'wisuda_id', 'id');
    }

    public function pengambilan()
    {
        return $this->hasOne(Pengambilan::class, 'wisuda_id', 'id');
    }

    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class, 'wisuda_id', 'id');
    }

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'id', 'mahasiswa_id');
    }

    public function periode()
    {
        return $this->hasOne(Periode::class, 'id', 'periode_id');
    }
}
