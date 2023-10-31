<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_kriteria extends Model
{
    use HasFactory;

	protected $guarded = [];


    public function kriteria()
	{
		return $this->belongsTo(Kriteria::class);
	}
}
