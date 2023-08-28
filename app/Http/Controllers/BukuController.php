<?php

namespace App\Http\Controllers;
use App\Models\Buku;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $bukus = $user->bukus;

        return response()->json(['data' => $bukus]);
    }
}
