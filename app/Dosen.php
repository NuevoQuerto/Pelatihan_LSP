<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'tbl_dosen';

    protected $fillable = [
        'nama', 'alamat',
    ];
}
