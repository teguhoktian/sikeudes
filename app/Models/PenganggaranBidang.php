<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class PenganggaranBidang extends Model
{
    use HasFactory, Uuid;
    protected $fillable = ['id_bidang', 'id_desa', 'id_penganggaran_tahun'];
    protected $table = 'penganggaran_bidang';
    public $incrementing = false;

    /**
     * Get the tahun_anggaran that owns the PenganggaranBidang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tahun_anggaran()
    {
        return $this->belongsTo(PenganggaranTahun::class, 'id_penganggaran_tahun');
    }

    /**
     * Get the desa that owns the PenganggaranBidang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }

    /**
     * Get the bidang that owns the PenganggaranBidang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'id_bidang');
    }

    /**
     * Get all of the penganggaran_sbu_bidangs for the PenganggaranBidang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penganggaran_sbu_bidangs()
    {
        return $this->hasMany(PenganggaranSubBidang::class, 'id_penganggaran_bidang', 'id');
    }
}
