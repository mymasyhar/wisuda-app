<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    use HasFactory;

    protected $table = 'tahun_ajarans';
    protected $guarded = [];

    public function periode()
    {
        return $this->hasMany(Periode::class, 'tahun_ajaran_id', 'id');
    }

    public function getTahunAjaranAttribute()
    {
        $start = Carbon::parse($this->start_TA)->year;
        $end = Carbon::parse($this->end_TA)->year;

        return $start . '/' . $end;
    }
}
