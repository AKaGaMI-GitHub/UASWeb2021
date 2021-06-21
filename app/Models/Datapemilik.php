<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datapemilik extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pemilik';
    protected $fillable = [
        'nama_pemilik','jns_kelamin','tmpt_lhr','tgl_lhr','alamat','no_telp','tgl_daftar'
    ];
}