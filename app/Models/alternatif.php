<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alternatif extends Model
{
    use HasFactory;

    // lepaskan proteksi mass assignment
	protected $guarded = [];

    public function kode()
    {
        return $this->kode;
    }
    public function name()
    {
        return $this->name;
    }

	// relasi ke tabel nilai kriteria
    public function sub_kriteria()
	{
		return $this->belongsToMany(sub_kriteria::class, 'nilai_alternatif', 'sub_kriteria_id');
	}
}
