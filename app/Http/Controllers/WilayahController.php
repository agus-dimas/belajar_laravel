<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WilayahController extends Controller
{
    public function getProvinsis()
    {

        $response = Http::withHeaders(['Authorization' => 'Token 0a3a0a9d872181e5e20ef98826ae9eae6f89e656'])
            ->get('https://api.kompeni.app/api/v1/master/wilayah/?level=1')->throw()->object();
        return response()->json($response->data, 200);
    }

    public function getKabupatens($provinsiId)
    {
        $response = Http::withHeaders(['Authorization' => 'Token 0a3a0a9d872181e5e20ef98826ae9eae6f89e656'])
            ->get("https://api.kompeni.app/api/v1/master/wilayah/?level=2&parent={$provinsiId}")
            ->throw()
            ->object();
        return response()->json($response->data, 200);
    }

    public function getWilayah()
    {

        $response = Http::withHeaders(['Authorization' => 'Token 0a3a0a9d872181e5e20ef98826ae9eae6f89e656'])
            ->get('https://api.kompeni.app/api/v1/master/wilayah/', [
                'name' => 'Taylor',
                'page' => 1,
            ])->throw()->object();
        return response()->json($response->data, 200);
    }
}
