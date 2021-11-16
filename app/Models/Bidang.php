<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Bidang extends Model
{
    use HasFactory, Uuid;
    protected $fillable = ['nama', 'kode'];
    protected $table = 'bidang';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * Get all of the sub_bidangs for the Bidang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sub_bidangs()
    {
        return $this->hasMany(SubBidang::class, 'id_bidang', 'id');
    }

    public function getFullNameAttribute()
    {
        return $this->kode . ' - ' . $this->nama;
    }
}
