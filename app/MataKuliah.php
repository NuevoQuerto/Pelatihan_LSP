<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'tbl_matkul';

    protected $fillable = [
        'kd_matkul', 'nama', 'sks',
    ];
}
