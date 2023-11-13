<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai_alternatif extends Model
{


    use HasFactory;
	protected $guarded = [];

    public function sub_kriteria()
	{
		return $this->belongsTo(sub_kriteria::class);
	}

    public function alternatif()
	{
		return $this->belongsTo(alternatif::class);
	}
}
