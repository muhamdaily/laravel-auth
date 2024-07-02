<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;

class ProvinceController extends Controller
{
    public function index()
    {
        $provinsi = Province::get();

        return Response::json([
            'status' => true,
            'message' => 'Berhasil mengambil data provinsi',
            'data' => $provinsi
        ], 200);
    }

    public function update()
    {
        $response = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');

        $data = [];
        $no = 0;

        Province::truncate();

        foreach ($response['provinsi'] as $key) {
            $data[$no++] = [
                'id' => $key['id'],
                'name' => $key['nama'],
                'created_at' => now(),
                'updated_at' => now()
            ];
        };

        Province::insert($data);

        return Response::json([
            'status' => true,
            'message' => 'Berhasil mengupdate data provinsi',
            'data' => $data
        ], 200);
    }
}
