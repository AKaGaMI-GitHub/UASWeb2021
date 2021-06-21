<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_transaksi';
    protected $fillable = [
        'nama_pemilik','nama_hewan','jns_hewan','keluhan','tindakan','tgl_berkunjung','nama_dokter','harga'
    ];
}
