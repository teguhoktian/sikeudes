<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class RekeningKelompok extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ['nama', 'kode', 'id_akun'];
    protected $table = 'rekening_kelompok';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * Get the akun that owns the RekeningKelompok
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function akun()
    {
        return $this->belongsTo(RekeningAkun::class, 'id_akun');
    }

    /**
     * Get all of the jenises for the RekeningKelompok
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jenises()
    {
        return $this->hasMany(RekeningJenis::class, 'id_kelompok', 'id');
    }

    public function getFullNameAttribute()
    {
        return (($this->akun) ? $this->akun->kode : '') . "." . $this->kode . ' - ' . $this->nama;
    }
}
