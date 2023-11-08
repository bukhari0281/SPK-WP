<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_kriteria extends Model
{
    use HasFactory;

	protected $guarded = [];

    public function nilai()
    {
        return $this->nilai;
    }
    public function name()
    {
        return $this->name;
    }

    public function alternatif()
	{
		return $this->belongsTo(alternatif::class);
	}
    public function kriteria()
	{
		return $this->belongsTo(Kriteria::class);
	}
}
