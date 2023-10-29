<?php

namespace App\Models;

use App\Models\Kriteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasus extends Model
{
    use HasFactory;
    protected $table = 'kasuses';
    protected $fillable = ['name'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriterias');
    }
}
