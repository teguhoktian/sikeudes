<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class PerencanaanMisi extends Model
{
    use HasFactory, Uuid;
    protected $fillable = ['kode', 'uraian', 'id_visi'];
    protected $table = 'perencanaan_misi';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * Get the visi that owns the PerencanaanMisi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function visi()
    {
        return $this->belongsTo(PerencanaanVisi::class, 'id_visi');
    }

    /**
     * Get all of the tujuans for the PerencanaanMisi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tujuans()
    {
        return $this->hasMany(PerencanaanTujuan::class, 'id_misi', 'id');
    }

    public function getFullNameAttribute()
    {
        return (($this->visi) ? $this->visi->kode : '') . "." . $this->kode . ' - ' . $this->uraian;
    }
}
