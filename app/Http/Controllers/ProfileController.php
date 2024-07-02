<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\District;
use App\Models\Province;
use App\Models\Subdistrict;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $provinsi = Province::all(); // Ambil semua provinsi

        $user = $request->user(); // Ambil user yang sedang login
        $selectedProvinsi = $user->province_id; // Ambil ID provinsi user
        $selectedKabupaten = $user->district_id; // Ambil ID kabupaten user
        $selectedKecamatan = $user->subdistrict_id; // Ambil ID kecamatan user

        return view('profile.edit', [
            'user' => $user,
            'provinsi' => $provinsi,
            'selectedProvinsi' => $selectedProvinsi,
            'selectedKabupaten' => $selectedKabupaten,
            'selectedKecamatan' => $selectedKecamatan,
        ]);
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->withToastSuccess('Informasi profil berhasil diperbarui.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Get Kabupaten/Kota data based on the selected province.
     */
    public function getKab(Request $request)
    {
        $id_provinsi = $request->id_provinsi;
        $kabupatens = District::where('province_id', $id_provinsi)->get();

        $options = "<option value=''>Pilih Kabupaten</option>";

        foreach ($kabupatens as $kabupaten) {
            $options .= "<option value='$kabupaten->id'>$kabupaten->name</option>";
        }

        echo $options;
    }

    public function getKec(Request $request)
    {
        $id_kabupaten = $request->id_kabupaten;
        $kecamatans = Subdistrict::where('district_id', $id_kabupaten)->get();

        $options = "<option value=''>Pilih Kecamatan</option>";

        foreach ($kecamatans as $kecamatan) {
            $options .= "<option value='$kecamatan->id'>$kecamatan->name</option>";
        }

        echo $options;
    }
}
