<?php

namespace App\Http\Controllers;

use App\Models\Hobi;
use Illuminate\Http\Request;


class HobiController extends Controller
{
    public function index(Request $request)
    {
        $query = Hobi::query();

         if ($request->has('search')) {
         
         $search = $request->input('search');
         $query->where('nama_hobi', 'LIKE', "%{$search}%")
                ->orWhere('deskripsi', 'LIKE', "%{$search}%");
         }
 
         $hobis = $query->paginate(10);
 
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
