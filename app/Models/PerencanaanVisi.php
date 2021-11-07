<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Illuminate\Support\Facades\DB;

class PerencanaanVisi extends Model
{
    use HasFactory, Uuid;
    protected $fillable = ['kode', 'uraian', 'tahun_awal', 'tahun_akhir', 'id_desa'];
    protected $table = 'perencanaan_visi';
    public $incrementing = false;

    /**
     * Get the desa that owns the KepalaDesa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }

    /**
     * Get all of the misis for the PerencanaanVisi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function misis()
    {
        return $this->hasMany(PerencanaanMisi::class, 'id_visi', 'id')->orderBy('kode', 'ASC');
    }

    public function getFullNameAttribute()
    {
        return $this->kode . ' - ' . $this->uraian;
    }

}
