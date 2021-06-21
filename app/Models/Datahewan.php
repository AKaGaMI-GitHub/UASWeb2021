<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datahewan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_hewan';
    protected $fillable = [
        'nama_hewan','jns_hewan','jns_kelamin','tgl_lhr','nama_pemilik'
    ];
}
