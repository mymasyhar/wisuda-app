<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $table = 'prodis';

    public function fakultas()
    {
        # code...
        return $this->hasOne(Fakultas::class, 'id', 'fakultas_id');
    }
}
