<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Subdistrict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;

class SubDistrictController extends Controller
{
    public function index(Request $request)
    {
        $id_kabupaten = $request->district_id;
        $kecamatan = Subdistrict::where('id', "!=", null);

        if ($id_kabupaten) {
            $kecamatan->where('district_id', $id_kabupaten);
        }

        return Response::json([
            'status' => true,
            'message' => 'Berhasil mengambil data kecamatan',
            'data' => $kecamatan->get()
        ], 200);
    }

    public function update()
    {
        $kabupaten = District::all();

        Subdistrict::truncate();

        $data = [];
        $no = 0;

        foreach ($kabupaten as $kab) {
            $response = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=' . $kab->id);
            foreach ($response['kecamatan'] as $key) {
                $data[$no++] = [
                    'id' => $key['id'],
                    'district_id' => $key['id_kota'],
                    'name' => $key['nama'],
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            };
        };

        Subdistrict::insert($data);

        return Response::json([
            'status' => true,
            'message' => 'Berhasil mengupdate data kecamatan',
            'data' => $data
        ], 200);
    }
}
