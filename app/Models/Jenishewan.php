<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenishewan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_jns_hewan';
    protected $fillable = [
        'jns_hewan'
    ];
}
