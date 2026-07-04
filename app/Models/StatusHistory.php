<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusHistory extends Model
{
    protected $table = 'status_history';

    protected $fillable = [
        'laporan_id',
        'status_baru',
        'catatan',
        'updated_by',
    ];

    // Relasi ke laporan
    public function laporan()
    {
        return $this->belongsTo(Laporan::class, 'laporan_id');
    }
}
