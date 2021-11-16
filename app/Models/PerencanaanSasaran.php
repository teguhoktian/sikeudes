<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;


class PerencanaanSasaran extends Model
{
    use HasFactory, Uuid;
    protected $fillable = ['kode', 'uraian', 'id_tujuan'];
    protected $table = 'perencanaan_sasaran';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * Get the tujuan that owns the PerencanaanSasaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tujuan()
    {
        return $this->belongsTo(PerencanaanTujuan::class, 'id_tujuan');
    }
}
