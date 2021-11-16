<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Kecamatan extends Model
{
    use HasFactory, Uuid;
    protected $table = 'kecamatan';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['nama', 'kode', 'id_kabupaten'];

    /**
     * Get the kabupaten that owns the Kecamatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'id_kabupaten');
    }

    /**
     * Get all of the desas for the Kecamatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function desas()
    {
        return $this->hasMany(Desa::class, 'id_kecamatan', 'id');
    }
}
