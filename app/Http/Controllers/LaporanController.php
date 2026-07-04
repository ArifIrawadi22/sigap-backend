<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\StatusHistory;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // Ambil semua laporan (untuk peta & feed)
    public function index()
    {
        $laporan = Laporan::orderBy('created_at', 'desc')->get();
        return response()->json([
            'success' => true,
            'data'    => $laporan
        ]);
    }

    // Kirim laporan baru
    public function store(Request $request)
    {
        try {
            $request->validate([
                'kategori'     => 'required',
                'judul'        => 'required',
                'nama_pelapor' => 'required',
                'no_wa'        => 'required',
            ]);

            $laporan = Laporan::create([
                'kategori'     => $request->kategori,
                'judul'        => $request->judul,
                'deskripsi'    => $request->deskripsi,
                'latitude'     => $request->latitude,
                'longitude'    => $request->longitude,
                'keparahan'    => $request->keparahan ?? 'sedang',
                'kecamatan'    => $request->kecamatan,
                'nama_pelapor' => $request->nama_pelapor,
                'no_wa'        => $request->no_wa,
                'status'       => 'menunggu',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Laporan berhasil dikirim!',
                'data'    => $laporan
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    // Ambil detail satu laporan (untuk tracking)
    public function show($id)
    {
        $laporan = Laporan::with('statusHistory')->find($id);

        if (!$laporan) {
            return response()->json([
                'success' => false,
                'message' => 'Laporan tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $laporan
        ]);
    }

    // Update status laporan (untuk petugas)
    public function updateStatus(Request $request, $id)
    {
        $laporan = Laporan::find($id);

        if (!$laporan) {
            return response()->json([
                'success' => false,
                'message' => 'Laporan tidak ditemukan'
            ], 404);
        }

        $laporan->update(['status' => $request->status]);

        // Simpan ke history
        StatusHistory::create([
            'laporan_id' => $laporan->id,
            'status_baru' => $request->status,
            'catatan'    => $request->catatan ?? '',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Status berhasil diupdate!'
        ]);
    }

    // Upvote laporan
    public function upvote($id)
    {
        $laporan = Laporan::find($id);
        $laporan->increment('upvote_count');

        return response()->json([
            'success' => true,
            'upvote_count' => $laporan->upvote_count
        ]);
    }
}
