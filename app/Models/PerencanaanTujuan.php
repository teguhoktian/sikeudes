<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class PerencanaanTujuan extends Model
{
    use HasFactory, Uuid;
    protected $fillable = ['kode', 'uraian', 'id_misi'];
    protected $table = 'perencanaan_tujuan';
    public $incrementing = false;

    /**
     * Get the misi that owns the PerencanaanTujuan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function misi()
    {
        return $this->belongsTo(PerencanaanMisi::class, 'id_misi');
    }

    /**
     * Get all of the sasarans for the PerencanaanTujuan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sasarans()
    {
        return $this->hasMany(PerencanaanSasaran::class, 'id_tujuan', 'id');
    }

    public function getFullNameAttribute()
    {
        return (($this->misi) ? $this->misi->visi->kode .".". $this->misi->kode : '') . "." . $this->kode . ' - ' . $this->uraian;
    }
}
