<?php

namespace App\Models;

use App\Models\Kriteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasus extends Model
{
    use HasFactory;
    protected $table = 'kasuses';
    protected $fillable = ['kriteria_id','name'];

    public function kriteria_id()
    {
        return $this->kriteria_id;
    }
    public function name()
    {
        return $this->name;
    }

    public function Kriterias()
    {
        return $this->hasMany(Kriteria::class, 'kasus_id');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }
}
