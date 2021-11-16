<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Kabupaten extends Model
{
    use HasFactory, Uuid;
    protected $table = 'kabupaten';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['nama', 'kode', 'id_provinsi'];

    /**
     * Get the provinsi that owns the Kabupaten
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'id_provinsi');
    }

    /**
     * Get all of the kecamatans for the Kabupaten
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kecamatans()
    {
        return $this->hasMany(Kecamatan::class, 'id_kabupaten', 'id');
    }
}
