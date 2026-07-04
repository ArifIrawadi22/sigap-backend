<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upvote extends Model
{
    protected $table = 'upvotes';

    protected $fillable = [
        'laporan_id',
        'identifier',
    ];

    // Relasi ke laporan
    public function laporan()
    {
        return $this->belongsTo(Laporan::class, 'laporan_id');
    }
}
