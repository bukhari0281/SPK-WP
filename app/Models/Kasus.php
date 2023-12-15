<?php

namespace App\Models;

use App\Models\Kriteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasus extends Model
{
    use HasFactory;
    protected $table = 'kasuses';
    protected $fillable = ['kode','name'];

    public function kode()
    {
        return $this->kode;
    }
    public function name()
    {
        return $this->name;
    }

    public function get_kriteria()
    {
        return $this->hasMany(Kriteria::class);
    }

    public function bobot_kriteria()
    {
        return $this->hasMany(bobot_kriteria::class);
    }
}
