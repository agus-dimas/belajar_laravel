<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Models\Biodata;

class biodataController extends Controller
{
    public function index()
    {
        return view('biodata.form');
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

            Biodata::create([
            'nik' => $validatedData['nik'],
            'nama' => $validatedData['nama'],
            'temp_lahir' => $validatedData['temp_lahir'],
            'tgl_lahir' => $validatedData['tgl_lahir'],
            'kabupaten' => $validatedData['kabupaten'],
            'kecamatan' => $validatedData['kecamatan'],
            'desa' => $validatedData['desa'],
            'provinsi' => $validatedData['provinsi'],
            'gambar' => $nama_gambar,
            ]);
                
            Storage::disk('local')->put('images/'.$nama_gambar, 'Contens');
                
            return view('biodata.result', compact('nik','nama','temp_lahir','tgl_lahir','kabupaten', 'kecamatan','desa', 'provinsi','nama_gambar'));
    }
}

