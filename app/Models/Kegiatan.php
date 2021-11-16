<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Kegiatan extends Model
{
    use HasFactory, Uuid;
    protected $fillable = ['nama', 'kode', 'id_sub_bidang'];
    protected $table = 'kegiatan';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * Get the sub_bidang that owns the Kegiatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sub_bidang()
    {
        return $this->belongsTo(SubBidang::class, 'id_sub_bidang');
    }

    public function getFullNameAttribute()
    {
        return (($this->sub_bidang) ? $this->sub_bidang->bidang->kode . "." . $this->sub_bidang->kode : '') . "." . $this->kode . ' - ' . $this->nama;
    }
}
