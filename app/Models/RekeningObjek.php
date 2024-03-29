<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class RekeningObjek extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ['nama', 'kode', 'id_jenis'];
    protected $table = 'rekening_objek';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $appends = [
        'full_code'
    ];

    /**
     * Get the jenis that owns the RekeningObjek
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jenis()
    {
        return $this->belongsTo(RekeningJenis::class, 'id_jenis');
    }

    public function getFullCodeAttribute()
    {
        $kode  = $this->jenis->kelompok->akun->kode;
        $kode .= '.';
        $kode .= $this->jenis->kelompok->kode;
        $kode .= '.';
        $kode .= $this->jenis->kode;
        $kode .= '.';
        $kode .= $this->kode;

        return $kode;
    }
}
