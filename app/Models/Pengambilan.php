<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pengambilan extends Model
{
    protected $table = 'pengambilans';
    protected $guarded = [];

    public function wisuda()
    {
        # code...
        return $this->hasOne(Wisuda::class, 'wisuda_id', 'id');
    }
}
