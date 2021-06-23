<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    use HasFactory;

    protected $table = 'tahun_ajarans';
    protected $guarded = []; //akses manipulasi table (lawannya fillabe)

    public function periode()
    {
        return $this->hasMany(Periode::class, 'tahun_ajaran_id', 'id');
    }

    public function getPeriodeTerakhirStartDateAttribute()
    {
        return $this->hasMany(Periode::class, 'tahun_ajaran_id', 'id')->latest()->value('start');
    }

    public function getPeriodeTerakhirEndDateAttribute()
    {
        return $this->hasMany(Periode::class, 'tahun_ajaran_id', 'id')->latest()->value('end');
    }

    public function getTahunAjaranAttribute()
    {
        $start = Carbon::parse($this->start_TA)->year;
        $end = Carbon::parse($this->end_TA)->year;

        return $start . '/' . $end;
    }
}
