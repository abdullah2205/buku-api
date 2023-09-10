<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $buku = $user->bukus;

        if ($buku->isEmpty()) {
            return response()->json([
                'pesan' => 'Pengguna ini belum mempunyai buku'
            ], 404);
        }
        
        return response()->json([
            'pesan' => 'List Buku',
            'data' => $buku
        ]);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string',
            'tahun' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'pesan' => 'Validasi gagal', 
                'errors' => $validator->errors()
            ], 400);
        }

        $user = $request->user();

        $buku = Buku::create([
            'judul' => $request->input('judul'),
            'tahun' => $request->input('tahun'),
            'user_id' => $user->id, // Menyimpan ID user pemilik buku
        ]);

        return response()->json([
            'pesan' => 'Buku berhasil ditambah', 
            'data' => $buku
        ], 201);
    }

    public function show(Request $request, $id)
    {
        $user = $request->user();
        $buku = $user->bukus->find($id);

        if (!$buku) {
            return response()->json([
                'pesan' => 'Buku tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'pesan' => 'Data Buku',
            'data' => $buku
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string',
            'tahun' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'pesan' => 'Validasi gagal', 
                'errors' => $validator->errors()
            ], 400);
        }

        $buku = Buku::find($id);

        if (!$buku) {
            return response()->json([
                'pesan' => 'Buku tidak ditemukan'
            ], 404);
        }

        $buku->update([
            'judul' => $request->input('judul'),
            'tahun' => $request->input('tahun'),
        ]);

        return response()->json([
            'pesan' => 'Buku berhasil diubah', 
            'data' => $buku
        ], 200);
    }

    public function destroy(Request $request, string $id)
    {
        $user = $request->user();
        $buku = $user->bukus->find($id);

        if (!$buku) {
            return response()->json([
                'pesan' => 'Buku tidak ditemukan'
            ], 404);
        }

        Buku::destroy($id);

        return response()->json([
            'pesan' => 'Buku berhasil dihapus', 
            'data' => $buku
        ], 200);
    }
}
