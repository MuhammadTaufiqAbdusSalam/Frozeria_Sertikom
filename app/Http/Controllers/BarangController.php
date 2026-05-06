<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $query = Barang::with('kategori');

        // SEARCH
        if ($request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        // FILTER KATEGORI
        if ($request->kategori) {
            $query->where('kategori_id', $request->kategori);
        }

        $barangs = $query->paginate(10);
        $kategoris = Kategori::all();

        // CARD
        $totalBarang = Barang::count();
        $totalKategori = Kategori::count();
        $stokMenipis = Barang::where('stok', '<', 20)->count();
        $stokHabis = Barang::where('stok', 0)->count();

        return view('dashboard', compact(
            'barangs',
            'kategoris',
            'totalBarang',
            'totalKategori',
            'stokMenipis',
            'stokHabis'
        ));
    }

    public function store(Request $request)
    {
        Barang::create($request->all());
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->back();
    }

    public function destroy($id)
    {
        Barang::destroy($id);
        return redirect()->back();
    }

    public function show($id)
    {
        $barang = Barang::with('kategori')->findOrFail($id);
        return view('detail', compact('barang'));
    }
}
