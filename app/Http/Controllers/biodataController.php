<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Models\Biodata;
use Carbon\Carbon;

class biodataController extends Controller
{
    public function index()
    {   
        $biodata = Biodata::all();
        return view('biodata.anggota', compact ('biodata'));
    }
    public function create()
    {
        return view('biodata.form');
    }


    public function show($id)
    {
        $biodata = Biodata::findOrFail($id);
        return view('biodata.show', ['biodata' => $biodata]);
    }

    public function edit($id)
    {
        $biodata = Biodata::findOrFail($id);
        return view('biodata.edit', ['biodata' => $biodata]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nik' => 'required|integer',
            'nama' => 'required|string',
            'temp_lahir' => 'required|string',
            'tgl_lahir' => 'required|string',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'desa' => 'required|string',
            'provinsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $biodata = Biodata::findOrFail($id);
        
        $biodata->nik = $validatedData['nik'];
        $biodata->nama = $validatedData['nama'];
        $biodata->temp_lahir = $validatedData['temp_lahir'];
        $biodata->tgl_lahir = $validatedData['tgl_lahir'];
        $biodata->kabupaten = $validatedData['kabupaten'];
        $biodata->kecamatan = $validatedData['kecamatan'];
        $biodata->desa = $validatedData['desa'];
        $biodata->provinsi = $validatedData['provinsi'];
        
        if ($request->hasFile('gambar')) {
            $now = Carbon::now()->format('d-m-y');
            $gambar = $validatedData['gambar'];

            $nama_gambar = $gambar->getClientOriginalName();
            $gambar_path = "images/" . $now;

            Storage::disk('public')->putFileAs($gambar_path, $request->gambar, $nama_gambar);
            $biodata->gambar = $gambar_path . '/' . $nama_gambar;
        }

        $biodata->save();

        return redirect()->route('biodata.show', $id)->with('success', 'Biodata berhasil diperbarui');
    }

    public function inputdata(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|integer',
            'nama' => 'required|string',
            'temp_lahir' => 'required|string',
            'tgl_lahir' => 'required|string',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'desa' => 'required|string',
            'provinsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif',

        ]);

        $now = Carbon::now()->format('d-m-y');

        $nik =  $validatedData['nik'];
        $nama =  $validatedData['nama'];
        $temp_lahir =  $validatedData['temp_lahir'];
        $tgl_lahir =  $validatedData['tgl_lahir'];
        $kabupaten =  $validatedData['kabupaten'];
        $kecamatan =  $validatedData['kecamatan'];
        $desa =  $validatedData['desa'];
        $provinsi =  $validatedData['provinsi'];
        $gambar = $validatedData['gambar'];

        $nama_gambar = $gambar->getClientOriginalName();
        $gambar_path = "images/" . $now;

        // Storage::disk('public')->put("images/" . $now .'/'. $nama_gambar, $request->gambar);
        Storage::disk('public')->putFileAs($gambar_path, $request->gambar, $nama_gambar);
        Biodata::create([
            'nik' => $validatedData['nik'],
            'nama' => $validatedData['nama'],
            'temp_lahir' => $validatedData['temp_lahir'],
            'tgl_lahir' => $validatedData['tgl_lahir'],
            'kabupaten' => $validatedData['kabupaten'],
            'kecamatan' => $validatedData['kecamatan'],
            'desa' => $validatedData['desa'],
            'provinsi' => $validatedData['provinsi'],
            'gambar' => $gambar_path . '/' . $nama_gambar,
        ]);
        
        return view('biodata.result', compact('nik', 'nama', 'temp_lahir', 'tgl_lahir', 'kabupaten', 'kecamatan', 'desa', 'provinsi','gambar_path', 'nama_gambar'));
    }
}
