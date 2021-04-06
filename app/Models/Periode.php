<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $table = 'periodes';
    protected $guarded = [];

    public function pelaksanaan()
    {
        return $this->hasOne(Pelaksanaan::class, 'periode_id', 'id');
    }

    public function wisuda()
    {
        return $this->hasOne(Wisuda::class, 'id', 'wisuda_id');
    }
}
