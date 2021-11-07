<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class RekeningJenis extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ['nama', 'kode', 'id_kelompok'];
    protected $table = 'rekening_jenis';
    public $incrementing = false;

    /**
     * Get the kelompok that owns the RekeningJenis
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kelompok()
    {
        return $this->belongsTo(RekeningKelompok::class, 'id_kelompok');
    }

    /**
     * Get all of the objeks for the RekeningJenis
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function objeks()
    {
        return $this->hasMany(RekeningObjek::class, 'id_jenis', 'id');
    }

    public function getFullNameAttribute()
    {
        return (($this->kelompok) ? $this->kelompok->akun->kode . '.' . $this->kelompok->kode : '') . "." . $this->kode . ' - ' . $this->nama;
    }
}
