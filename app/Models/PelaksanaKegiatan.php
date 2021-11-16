<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class PelaksanaKegiatan extends Model
{
    use HasFactory, Uuid;
    protected $fillable = ['nama', 'jabatan', 'aktif', 'id_desa'];
    protected $table = 'pelaksana_kegiatan';
    protected $keyType = 'string';
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

    public function getFullNameAttribute()
    {
        return $this->nama . " (" . $this->jabatan . ")";
    }
}
