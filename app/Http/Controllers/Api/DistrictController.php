<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;

class DistrictController extends Controller
{
    public function index(Request $request)
    {
        $id_provinsi = $request->province_id;
        $kabupaten = District::where('id', "!=", null);

        if ($id_provinsi) {
            $kabupaten->where('province_id', $id_provinsi);
        }

        return Response::json([
            'status' => true,
            'message' => 'Berhasil mengambil data kabupaten atau kota',
            'data' => $kabupaten->get()
        ], 200);
    }

    public function update()
    {
        $provinsi = Province::all();

        District::truncate();

        $data = [];
        $no = 0;

        foreach ($provinsi as $prov) {
            $response = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=' . $prov->id);
            foreach ($response['kota_kabupaten'] as $key) {
                $data[$no++] = [
                    'id' => $key['id'],
                    'province_id' => $key['id_provinsi'],
                    'name' => $key['nama'],
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            };
        };

        District::insert($data);

        return Response::json([
            'status' => true,
            'message' => 'Berhasil mengupdate data kabupaten atau kota',
            'data' => $data
        ], 200);
    }
}
