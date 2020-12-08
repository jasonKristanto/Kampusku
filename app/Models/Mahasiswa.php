<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    protected $fillable = ['nim', 'nama', 'jenis_kelamin', 'usia'];
    public $incrementing = false;
    public $timestamps = false;
}
