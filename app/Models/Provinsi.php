<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Provinsi extends Model
{
    use Uuid, HasFactory;
    protected $table = 'provinsi';
    public $incrementing = false;
    protected $fillable = ['nama', 'kode'];
    protected $keyType = 'string';

    /**
     * Get all of the kabupatens for the Provinsi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kabupatens()
    {
        return $this->hasMany(Kabupaten::class, 'id_provinsi', 'id');
    }
}
