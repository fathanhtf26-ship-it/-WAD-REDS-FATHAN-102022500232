<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DosenModel extends Model
{
    protected $table = 'dosen';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_dosen',
        'nidn',
        'jabatan_fungsional',
        'kepakaran_riset',
    ];

    public $timestamps = false;
}
