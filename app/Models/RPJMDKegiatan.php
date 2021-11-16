<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class RPJMDKegiatan extends Model
{
    use HasFactory, Uuid;
    protected $fillable = ['id_rpjmd_sub_bidang', 'id_kegiatan', 'id_sasaran', 'lokasi', 'keluaran', 'sasaran_manfaat', 'pola'];
    protected $table = 'rpjmd_kegiatan';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * Get the sub_bidang that owns the RPJMDKegiatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rpjmd_sub_bidang()
    {
        return $this->belongsTo(RPJMDSubBidang::class, 'id_rpjmd_sub_bidang');
    }

    /**
     * Get the kegiatan that owns the RPJMDKegiatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'id_kegiatan');
    }

    /**
     * Get the sasaran that owns the RPJMDKegiatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sasaran()
    {
        return $this->belongsTo(PerencanaanSasaran::class, 'id_sasaran');
    }

    /**
     * Get all of the tahuns for the RPJMDKegiatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tahuns()
    {
        return $this->hasMany(RPJMDTahunKegiatan::class, 'id_rpjmd_kegiatan', 'id');
    }
}
