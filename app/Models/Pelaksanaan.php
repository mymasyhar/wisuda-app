<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pelaksanaan extends Model
{
    use HasFactory;

    protected $table = 'pelaksanaans';
    protected $guarded = [];

    public function getPendaftaranAttribute()
    {
        $start = Carbon::parse($this->start_pendaftaran)->format('j F Y');
        $end = Carbon::parse($this->end_pendaftaran)->format('j F Y');

        return $start . ' - ' . $end;
    }

    public function getVerifikasiAttribute()
    {
        $start = Carbon::parse($this->start_verifikasi)->format('j F Y');
        $end = Carbon::parse($this->end_verifikasi)->format('j F Y');

        return $start . ' - ' . $end;
    }

    public function getPengambilanAttribute()
    {
        $start = Carbon::parse($this->start_pengambilan)->format('j F Y');
        $end = Carbon::parse($this->end_pengambilan)->format('j F Y');

        return $start . ' - ' . $end;
    }

    public function getPengembalianAttribute()
    {
        $start = Carbon::parse($this->start_pengembalian)->format('j F Y');
        $end = Carbon::parse($this->end_pengembalian)->format('j F Y');

        return $start . ' - ' . $end;
    }

    public function getPelaksanaanWisudaAttribute()
    {
        # code...
        $wisuda = Carbon::parse($this->wisuda)->format('j F Y');
        return $wisuda;
    }
}
