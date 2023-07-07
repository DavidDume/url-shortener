<?php

namespace App\Http\Controllers;

use App\Models\UrlShortener;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UrlShortenerController extends Controller
{
    public function generateKey(Request $request)
    {

        $key = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 7); //crea una key unica per ogni url

        DB::table('urls')->insert([
            'longUrl' => $request->longUrl,
            'key' => $key
        ]);

        return response()->json(['success' => true, 'data' => $key]);
    }
}
