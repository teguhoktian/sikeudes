<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class PenganggaranBelanja extends Model
{
    use HasFactory, Uuid;
    protected $fillable = [
        'id_penganggaran_tahun',
        'id_penganggaran_kegiatan',
        'id_rekening_objek',
        'id_sumber_dana',
        'uraian',
        'volume',
        'satuan',
        'harga_satuan'
    ];
    protected $table = 'penganggaran_belanja';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * Get the tahun_anggaran that owns the PenganggaranBelanja
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tahun_anggaran()
    {
        return $this->belongsTo(PenganggaranTahun::class, 'id_penganggaran_tahun');
    }

    /**
     * Get the penganggaran_kegiatan that owns the PenganggaranBelanja
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function penganggaran_kegiatan()
    {
        return $this->belongsTo(PenganggaranKegiatan::class, 'id_penganggaran_kegiatan');
    }

    /**
     * Get the sumber_dana that owns the PenganggaranBelanja
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sumber_dana()
    {
        return $this->belongsTo(SumberDana::class, 'id_sumber_dana');
    }

    /**
     * Get the rekening_objek that owns the PenganggaranBelanja
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rekening_objek()
    {
        return $this->belongsTo(RekeningObjek::class, 'id_rekening_objek');
    }
}
