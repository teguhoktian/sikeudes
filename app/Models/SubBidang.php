<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class SubBidang extends Model
{
    use HasFactory, Uuid;
    protected $fillable = ['nama', 'kode', 'id_bidang'];
    protected $table = 'sub_bidang';
    public $incrementing = false;

    /**
     * Get the bidang that owns the SubBidang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'id_bidang');
    }

    /**
     * Get all of the kegiatans for the SubBidang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class, 'id_sub_bidang', 'id');
    }

    public function getFullNameAttribute()
    {
        return (($this->bidang) ? $this->bidang->kode : '') . "." . $this->kode . ' - ' . $this->nama;
    }
}
