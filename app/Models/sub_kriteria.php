<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_kriteria extends Model
{
    use HasFactory;

	protected $table = 'sub_kriterias';
    protected $fillable = ['kode_sub_kriteria','name','nilai','keterangan', 'kriteria_id'];

    public function nilai()
    {
        return $this->nilai;
    }
    public function name()
    {
        return $this->name;
    }

    public function kriteria()
	{
		return $this->belongsTo(Kriteria::class);
	}

    public function alternatif()
	{
		return $this->belongsToMany(alternatif::class, 'nilai_alternatif', 'alternatif_id');
	}
}
