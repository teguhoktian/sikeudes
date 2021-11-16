<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class PenganggaranKegiatan extends Model
{
    use HasFactory, Uuid;
    protected $fillable = ['id_penganggaran_sub_bidang', 'id_kegiatan', 'id_pelaksana', 'lokasi', 'keluaran', 'waktu_pelaksanaan', 'pagu', 'volume', 'satuan'];
    protected $table = 'penganggaran_kegiatan';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * Get the penganggaran_sub_bidang that owns the PenganggaranKegiatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function penganggaran_sub_bidang()
    {
        return $this->belongsTo(PenganggaranSubBidang::class, 'id_penganggaran_sub_bidang');
    }

    /**
     * Get the kegiatan that owns the PenganggaranKegiatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'id_kegiatan');
    }

    /**
     * Get the pelaksana_kegiatan that owns the PenganggaranKegiatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pelaksana_kegiatan()
    {
        return $this->belongsTo(PelaksanaKegiatan::class, 'id_pelaksana');
    }

    /**
     * Get all of the penganggaran_paket_kegaitans for the PenganggaranKegiatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penganggaran_paket_kegaitans()
    {
        return $this->hasMany(PenganggaranPaketKegiatan::class, 'id_penganggaran_kegiatan', 'id');
    }
}
