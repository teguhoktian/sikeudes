<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class RPJMDDanaIndikatif extends Model
{
    use HasFactory, Uuid;
    protected $fillable = ['id_rpjmd_tahun_kegiatan', 'id_pelaksana_kegiatan', 'id_sumber_dana', 'lokasi', 'biaya', 'volume', 'satuan', 'waktu', 'pola', 'mulai', 'selesai'];
    protected $table = 'rpjmd_dana_indikatif';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * Get the tahun_kegiatan that owns the RPJMDDanaIndikatif
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tahun_kegiatan()
    {
        return $this->belongsTo(RPJMDTahunKegiatan::class, 'id_rpjmd_tahun_kegiatan');
    }

    /**
     * Get the pelaksana_kegiatan that owns the RPJMDDanaIndikatif
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pelaksana_kegiatan()
    {
        return $this->belongsTo(PelaksanaKegiatan::class, 'id_pelaksana_kegiatan');
    }

    /**
     * Get the sumber_dana that owns the RPJMDDanaIndikatif
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sumber_dana()
    {
        return $this->belongsTo(SumberDana::class, 'id_sumber_dana');
    }
}
