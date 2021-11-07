<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class RPJMDTahunKegiatan extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ['id_rpjmd_kegiatan', 'tahun', 'tahun_ke'];
    protected $table = 'rpjmd_tahun_kegiatan';
    public $incrementing = false;

    /**
     * Get the rpjmd_kegiatan that owns the RPJMDTahunKegiatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rpjmd_kegiatan()
    {
        return $this->belongsTo(RPJMDKegiatan::class, 'id_rpjmd_kegiatan');
    }

    /**
     * Get the dana_indikatif associated with the RPJMDTahunKegiatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function dana_indikatif()
    {
        return $this->hasOne(RPJMDDanaIndikatif::class, 'id_rpjmd_tahun_kegiatan', 'id');
    }

    public function getFullNameAttribute()
    {
        return __('Tahun ke ') . $this->tahun_ke;
    }
}
