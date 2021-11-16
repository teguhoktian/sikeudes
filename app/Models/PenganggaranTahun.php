<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class PenganggaranTahun extends Model
{
    use HasFactory, Uuid;
    protected $fillable = ['tahun', 'id_desa'];
    protected $table = 'penganggaran_tahun';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * Get the desa that owns the PenganggaranTahun
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
