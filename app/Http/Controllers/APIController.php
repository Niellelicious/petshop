<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\petshop;

class APIController extends Controller
{
    public function searchpetshop(Request $request)
    {
        $cari = $request->input('q');

        $katalok = petshop::where('produk', 'LIKE', "%$cari%")->get();

        if($katalok->isEMpty())
        {
            return response()->json([
                'success' => false,
                'data' => 'Data Tidak Ditemukan'
            ], 404)->header('Access-Control-Allow-Origin', 'http://127.0.0.1:5500');;
        }
        else
        {
            return response()->json([
                'success' => true,
                'data' => $katalok
            ], 200)->header('Access-Control-Allow-Origin', 'http://127.0.0.1:5500');
        }

    }
}