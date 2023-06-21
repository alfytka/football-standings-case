<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klub extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function klub1()
    {
        return $this->hasMany(Skor_pertandingan::class, 'id_klub1', 'id');
    }

    public function klub2()
    {
        return $this->hasMany(Skor_pertandingan::class, 'id_klub2', 'id');
    }

}
