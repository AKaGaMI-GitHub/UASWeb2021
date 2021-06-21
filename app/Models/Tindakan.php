<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tindakan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_tindakan';
    protected $fillable = [
        'tindakan'
    ];
}
