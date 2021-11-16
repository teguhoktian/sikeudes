<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class PenganggaranSubBidang extends Model
{
    use HasFactory, Uuid;
    protected $fillable = ['id_sub_bidang', 'id_penganggaran_bidang'];
    protected $table = 'penganggaran_sub_bidang';
    protected $keyType = 'string';
    public $incrementing = false;


    /**
     * Get the sub_bidang that owns the PenganggaranSubBidang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sub_bidang()
    {
        return $this->belongsTo(SubBidang::class, 'id_sub_bidang');
    }

    /**
     * Get the penganggaran_bidang that owns the PenganggaranSubBidang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function penganggaran_bidang()
    {
        return $this->belongsTo(PenganggaranBidang::class, 'id_penganggaran_bidang');
    }

    /**
     * Get all of the penganggaran_kegiatans for the PenganggaranSubBidang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penganggaran_kegiatans()
    {
        return $this->hasMany(PenganggaranKegiatan::class, 'id_penganggaran_sub_bidang', 'id');
    }
}
