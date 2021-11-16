<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class KepalaDesa extends Model
{
    use HasFactory, Uuid;
    protected $fillable = ['nama', 'jabatan', 'tanggal_mulai_jabatan', 'tanggal_akhir_jabatan', 'aktif', 'id_desa'];
    protected $table = 'kepala_desa';
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
}
