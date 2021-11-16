<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class PenganggaranPendapatan extends Model
{
    use HasFactory, Uuid;
    protected $fillable = ['id_penganggaran_tahun', 'id_rekening_objek', 'id_sumber_dana', 'uraian', 'volume', 'satuan', 'harga_satuan'];
    protected $table = 'penganggaran_pendapatan';
    protected $keyType = 'string';
    public $incrementing = false;
}
