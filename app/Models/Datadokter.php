<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datadokter extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_dokter';
    protected $fillable = [
        'nama_dokter','tmpt_lhr','tgl_lhr','jns_kelamin','alamat','no_telp','agama','status'
    ];
}
