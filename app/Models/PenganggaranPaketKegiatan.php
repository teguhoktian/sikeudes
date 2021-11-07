<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class PenganggaranPaketKegiatan extends Model
{
    use HasFactory, Uuid;
    protected $fillable = ['id_penganggaran_kegiatan', 'id_sumber_dana', 'nama_paket', 'nilai_paket', 'pola', 'sifat_paket', 'volume_paket', 'lokasi_paket', 'satuan'];
    protected $table = 'penganggaran_paket_kegiatan';
    public $incrementing = false;


    /**
     * Get the penganggaran_kegiatan that owns the PenganggaranPaketKegiatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function penganggaran_kegiatan()
    {
        return $this->belongsTo(PenganggaranKegiatan::class, 'id_penganggaran_kegiatan');
    }

    /**
     * Get the sumber_dana that owns the PenganggaranPaketKegiatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sumber_dana()
    {
        return $this->belongsTo(SumberDana::class, 'id_sumber_dana');
    }
}
