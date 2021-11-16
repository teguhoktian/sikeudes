<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class RPJMDBidang extends Model
{
    use HasFactory, Uuid;
    protected $fillable = ['id_bidang', 'id_desa', 'id_visi'];
    protected $table = 'rpjmd_bidang';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * Get the desa that owns the RPJMDBidang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }

    /**
     * Get the bidang that owns the RPJMDBidang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'id_bidang');
    }

    /**
     * Get the visi that owns the RPJMDBidang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function visi()
    {
        return $this->belongsTo(PerencanaanVisi::class, 'id_visi');
    }

    /**
     * Get all of the rpjmd_subbidangs for the RPJMDBidang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rpjmd_subbidangs()
    {
        return $this->hasMany(RPJMDSubBidang::class, 'id_rpjmd_bidang', 'id');
    }
}
