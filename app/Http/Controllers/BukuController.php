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
        $bukus = $user->bukus;

        return response()->json([
            'pesan' => 'List Buku',
            'data' => $bukus
        ]);
    }
    
    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string',
            'tahun' => 'required|string',
        ]);

        // Jika validasi gagal, kirim pesan kesalahan
        if ($validator->fails()) {
            return response()->json([
                'pesan' => 'Validasi gagal', 
                'errors' => $validator->errors()
            ], 400);
        }

        // Buat buku baru
        $user = $request->user();
        $buku = Buku::create([
            'judul' => $request->input('judul'),
            'tahun' => $request->input('tahun'),
            'user_id' => $user->id, // Menyimpan ID user pemilik buku
        ]);

        // Kirim respons dengan buku yang baru dibuat
        return response()->json([
            'pesan' => 'Buku berhasil dibuat', 
            'data' => $buku
        ], 201);
    }
}
