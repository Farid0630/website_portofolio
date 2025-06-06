<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class riwayat extends Model
{
    use HasFactory;
    protected $table = 'riwayat';
    protected $fillable = [
        'judul',
        'tipe',
        'tgl_mulai',
        'tgl_akhir',
        'info1',
        'info2',
        'info3',
        'isi'
    ];

    protected $appendes =[
        'tgl_mulai_indo',
        'tgl_akhir_indo',
    ];

    public function getTglMulaiIndoAttribute()
    {
        return Carbon::parse($this->attributes['tgl_mulai'])->translatedFormat('d F Y');
    }

    public function getTglAkhirIndoAttribute()
    {
        if ($this->attributes['tgl_akhir']) {
            return Carbon::parse($this->attributes['tgl_akhir'])->translatedFormat('d F Y');
        }else{
            return 'Present';
        }
    }
}
