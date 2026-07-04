<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';

    protected $fillable = [
        'user_id',
        'kategori',
        'judul',
        'deskripsi',
        'foto',
        'latitude',
        'longitude',
        'keparahan',
        'kecamatan',
        'nama_pelapor',
        'no_wa',
        'status',
        'upvote_count',
    ];

    // Relasi ke tabel status_history
    public function statusHistory()
    {
        return $this->hasMany(StatusHistory::class, 'laporan_id');
    }

    // Relasi ke tabel upvotes
    public function upvotes()
    {
        return $this->hasMany(Upvote::class, 'laporan_id');
    }
}
