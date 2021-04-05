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
}
