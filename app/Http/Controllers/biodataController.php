<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;



use App\Models\Biodata;
use App\Models\Hobi;
use Carbon\Carbon;

class biodataController extends Controller
{
    public function index(Request $request)
    {
        $query = Biodata::query();

        if ($request->has('search')) {

        $search = $request->input('search');
        $query->where('nik', 'LIKE', "%{$search}%")
              ->orWhere('nama', 'LIKE', "%{$search}%")
              ->orWhere('temp_lahir', 'LIKE', "%{$search}%")
              ->orWhere('provinsi_name', 'LIKE', "%{$search}%")
              ->orWhere('kabupaten_name', 'LIKE', "%{$search}%")
              ->orWhere('kecamatan_name', 'LIKE', "%{$search}%")
              ->orWhere('desa_name', 'LIKE', "%{$search}%");
        }

        $biodatas = Biodata::all();

        // $biodatas = $query->paginate(10);

        return view('biodata.anggota', compact ('biodatas'));
    }

    public function create()
    {
        $hobis = Hobi::all();
        return view('biodata.form', compact ('hobis'));
    }


    public function show($id)
    {
        $biodata = Biodata::with('hobis')->findOrFail($id);
        return view('biodata.show', ['biodata' => $biodata]);
    }

    public function edit($id)
    {
        $biodata = Biodata::findOrFail($id);
        $hobis = Hobi::all();
        return view('biodata.edit', ['biodata'=>$biodata, 'hobis'=>$hobis]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_hobi' => 'required|integer',
            'nik' => 'required|integer',
            'nama' => 'required|string',
            'temp_lahir' => 'required|string',
            'tgl_lahir' => 'required|string',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'desa' => 'required|string',
            'provinsi' => 'required|string',
            'kabupaten_name' => 'required|string',
            'kecamatan_name' => 'required|string',
            'desa_name' => 'required|string',
            'provinsi_name' => 'required|string',

            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $biodata = Biodata::findOrFail($id);

        $biodata->id_hobi =  $validatedData['id_hobi'];
        $biodata->nik = $validatedData['nik'];
        $biodata->nama = $validatedData['nama'];
        $biodata->temp_lahir = $validatedData['temp_lahir'];
        $biodata->tgl_lahir = $validatedData['tgl_lahir'];
        $biodata->kabupaten_name = $validatedData['kabupaten_name'];
        $biodata->kecamatan_name = $validatedData['kecamatan_name'];
        $biodata->desa_name = $validatedData['desa_name'];
        $biodata->provinsi_name = $validatedData['provinsi_name'];

        if ($request->hasFile('gambar')) {
            $now = Carbon::now()->format('d-m-y');
            $gambar = $validatedData['gambar'];

            $nama_gambar = $gambar->getClientOriginalName();
            $gambar_path = "images/" . $now;

            Storage::disk('public')->putFileAs($gambar_path, $request->gambar, $nama_gambar);
            $biodata->gambar = $gambar_path . '/' . $nama_gambar;
        }

        $biodata->save();

        return redirect()->route('biodatas.show', $id)->with('success', 'Biodata berhasil diperbarui');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'id_hobi' => 'required|integer',
            'nik' => 'required|integer',
            'nama' => 'required|string',
            'temp_lahir' => 'required|string',
            'tgl_lahir' => 'required|string',
            'provinsi_id' => 'required|integer',
            'kabupaten_id' => 'required|integer',
            'kecamatan_id' => 'required|integer',
            'desa_id' => 'required|integer',
            'provinsi_name' => 'required|string',
            'kabupaten_name' => 'required|string',
            'kecamatan_name' => 'required|string',
            'desa_name' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif',

        ]);


        $now = Carbon::now()->format('d-m-y');

        $hobi =  $validatedData['id_hobi'];
        $nik =  $validatedData['nik'];
        $nama =  $validatedData['nama'];
        $temp_lahir =  $validatedData['temp_lahir'];
        $tgl_lahir =  $validatedData['tgl_lahir'];
        $provinsi_id =  $validatedData['provinsi_id'];
        $kabupaten_id =  $validatedData['kabupaten_id'];
        $kecamatan_id =  $validatedData['kecamatan_id'];
        $desa_id =  $validatedData['desa_id'];
        $provinsi_name = $validatedData['provinsi_name'];
        $kabupaten_name = $validatedData['kabupaten_name'];
        $kecamatan_name = $validatedData['kecamatan_name'];
        $desa_name = $validatedData['desa_name'];
        $gambar = $validatedData['gambar'];

        $nama_gambar = $gambar->getClientOriginalName();
        $gambar_path = "images/" . $now;

        Storage::disk('public')->putFileAs($gambar_path, $request->gambar, $nama_gambar);
        $newBiodata = Biodata::create([
            'nik' => $nik,
            'nama' => $nama,
            'temp_lahir' => $temp_lahir,
            'tgl_lahir' => $tgl_lahir,
            'provinsi_id' => $provinsi_id,
            'kabupaten_id' => $kabupaten_id,
            'kecamatan_id' => $kecamatan_id,
            'desa_id' => $desa_id,
            'provinsi_name' => $provinsi_name,
            'kabupaten_name' => $kabupaten_name,
            'kecamatan_name' => $kecamatan_name,
            'desa_name' => $desa_name,
            'gambar' => $gambar_path . '/' . $nama_gambar,
            'id_hobi' => $hobi,
        ]);
        $nama_hobi = Hobi::find($hobi)->nama_hobi;
        $deskripsi = Hobi::find($hobi)->deskripsi;

        return redirect('/biodatas');
    }
}
