<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'Kriterias';
    protected $fillable = ['kriteria','bobot','kasus_id'];

    public function kriteria()
    {
        return $this->kriteria;
    }

    public function Kasus()
    {
        return $this->belongsTo(Kasus::class, 'kasus_id');
    }

}
