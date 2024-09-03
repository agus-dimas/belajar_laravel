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

        // $biodatas = Biodata::latest()->paginate(10);

        $query = Biodata::query();

        if ($request->has('search')) {

        $search = $request->input('search');
        $query->where('nik', 'LIKE', "%{$search}%")
              ->orWhere('nama', 'LIKE', "%{$search}%")
              ->orWhere('temp_lahir', 'LIKE', "%{$search}%")
              ->orWhere('kabupaten', 'LIKE', "%{$search}%")
              ->orWhere('kecamatan', 'LIKE', "%{$search}%")
              ->orWhere('desa', 'LIKE', "%{$search}%")
              ->orWhere('provinsi', 'LIKE', "%{$search}%");
        }

        $biodatas = $query->paginate(10);

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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $biodata = Biodata::findOrFail($id);

        $biodata->id_hobi =  $validatedData['id_hobi'];
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

        // $biodata->update($validatedData);
        $biodata->save();

        return redirect()->route('biodatas.show', $id)->with('success', 'Biodata berhasil diperbarui');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        
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
        $kabupaten =  $validatedData['kabupaten'];
        $kecamatan =  $validatedData['kecamatan'];
        $desa =  $validatedData['desa'];
        $provinsi =  $validatedData['provinsi'];
        $provinsi_name = $validatedData['provinsi_name'];
        $kabupaten_name = $validatedData['kabupaten_name'];
        $kecamatan_name = $validatedData['kecamatan_name'];
        $desa_name = $validatedData['desa_name']; 
        $gambar = $validatedData['gambar'];
        
        $nama_gambar = $gambar->getClientOriginalName();
        $gambar_path = "images/" . $now;
        
        // dd($request->input('provinsi_name'));
      
        // Storage::disk('public')->put("images/" . $now .'/'. $nama_gambar, $request->gambar);
        Storage::disk('public')->putFileAs($gambar_path, $request->gambar, $nama_gambar);
        Biodata::create([
            'nik' => $validatedData['nik'],
            'nama' => $validatedData['nama'],
            'temp_lahir' => $validatedData['temp_lahir'],
            'tgl_lahir' => $validatedData['tgl_lahir'],
            'kabupaten_name' => $validatedData['kabupaten_name'],
            'kecamatan_name' => $validatedData['kecamatan_name'],
            'desa_name' => $validatedData['desa_name'],
            'provinsi_name' => $validatedData['provinsi_name'],
            'gambar' => $gambar_path . '/' . $nama_gambar,
            'id_hobi' => $hobi,
        ]);
        $nama_hobi = Hobi::find($hobi)->nama_hobi;
        $deskripsi = Hobi::find($hobi)->deskripsi;
        

        return view('biodata.result', compact('nik', 'nama', 'temp_lahir', 'tgl_lahir', 'kabupaten',
        'kecamatan', 'desa', 'provinsi','gambar_path', 'nama_gambar','nama_hobi','deskripsi',
        'provinsi_name', 'kabupaten_name','kecamatan_name','desa_name'));
    }
}
