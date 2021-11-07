<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class RPJMDSubBidang extends Model
{
    use HasFactory, Uuid;
    protected $fillable = ['id_sub_bidang', 'id_rpjmd_bidang'];
    protected $table = 'rpjmd_subbidang';
    public $incrementing = false;

    /**
     * Get the sub_bidang that owns the RPJMDSubBidang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sub_bidang()
    {
        return $this->belongsTo(SubBidang::class, 'id_sub_bidang');
    }

    /**
     * Get the rpjmd_bidang that owns the RPJMDSubBidang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rpjmd_bidang()
    {
        return $this->belongsTo(RPJMDBidang::class, 'id_rpjmd_bidang');
    }
}
