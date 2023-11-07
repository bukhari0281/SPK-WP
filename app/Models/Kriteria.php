<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'Kriterias';
    protected $fillable = ['kode','name','bobot','kasus_id'];

    public function name()
    {
        return $this->name;
    }

    public function bobot()
    {
        return $this->bobot;
    }

    public function Kasus()
    {
        return $this->belongsTo(Kasus::class, 'kasus_id');
    }

    public function subkriteria()
	{
		return $this->hasMany(sub_kriteria::class);
	}

}
