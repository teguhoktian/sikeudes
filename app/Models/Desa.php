<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Desa extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ['nama', 'kode', 'id_kecamatan'];
    protected $table = 'desa';
    public $incrementing = false;


    /**
     * Get the kecamatan that owns the Desa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
    }

    public function getFullNameAttribute()
    {
        return $this->nama . ' - ' . $this->kecamatan->nama . ' - ' . $this->kecamatan->kabupaten->nama;
    }

}
