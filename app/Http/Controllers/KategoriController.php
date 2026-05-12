<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $query = Kategori::withCount('barang')->latest();

        if ($request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $kategoris = $query->get();

        return view('kategori.index', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'nullable'
        ]);

        Kategori::create($validated);

        return redirect()->back()
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'nullable'
        ]);

        $kategori = Kategori::findOrFail($id);

        $kategori->update($validated);

        return response()->json([
            'success' => true
        ]);
    }

    public function destroy($id)
    {
        Kategori::findOrFail($id)->delete();

        return response()->json([
            'success' => true
        ]);
    }
}