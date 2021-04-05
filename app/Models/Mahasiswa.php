<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswas';

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function prodi()
    {
        return $this->hasOne(Prodi::class, 'id', 'prodi_id');
    }

    public function wisuda()
    {
        return $this->hasOne(Wisuda::class, 'mahasiswa_id', 'id');
    }
}
