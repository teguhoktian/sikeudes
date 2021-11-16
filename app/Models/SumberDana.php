<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class SumberDana extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ['nama', 'kode'];
    protected $table = 'sumber_dana';
    public $incrementing = false;
    protected $keyType = 'string';
}
