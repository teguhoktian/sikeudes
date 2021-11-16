<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class RekeningAkun extends Model
{
    use HasFactory, Uuid;
    protected $fillable = ['nama', 'kode'];
    protected $table = 'rekening_akun';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * Get all of the kelompoks for the RekeningAkun
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kelompoks()
    {
        return $this->hasMany(RekeningKelompok::class, 'id_akun', 'id');
    }

    public function getFullNameAttribute()
    {
        return $this->kode . ' - ' . $this->nama;
    }
}
