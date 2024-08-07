<?php

namespace App\Http\Controllers;

use App\Models\Hobi;
use Illuminate\Http\Request;


class HobiController extends Controller
{
    public function index()
    {
        $hobis = Hobi::all();
        return view('hobi.index', compact('hobis'));
    }

    public function create()
    {
        return view('hobi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_hobi' => 'required',
            'deskripsi' => 'required',
        ]);

        Hobi::create($request->all());
        return redirect()->route('hobi.index')->with('success', 'Hobi created successfully.');
    }
}
