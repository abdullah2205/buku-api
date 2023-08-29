<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
