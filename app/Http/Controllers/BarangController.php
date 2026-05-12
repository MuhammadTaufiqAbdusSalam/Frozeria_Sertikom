<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $query = Barang::with('kategori');

        if ($request->search) {

            $query->where(
                'nama',
                'like',
                '%' . $request->search . '%'
            );
        }

        if ($request->kategori) {

            $query->where(
                'kategori_id',
                $request->kategori
            );
        }

        $barangs = $query
            ->latest()
            ->paginate(10);

        $kategoris = Kategori::all();

        $totalBarang = Barang::count();

        $totalKategori = Kategori::count();

        $stokMenipis = Barang::where('stok', '>', 0)
            ->whereColumn(
                'stok',
                '<=',
                'stok_minimum'
            )->count();

        $stokHabis = Barang::where(
            'stok',
            0
        )->count();

        return view('barang.index', compact(
            'barangs',
            'kategoris',
            'totalBarang',
            'totalKategori',
            'stokMenipis',
            'stokHabis'
        ));
    }

    // STORE
    public function store(Request $request)
    {
        $validated = $request->validate([

            'nama' => 'required',
            'kategori_id' => 'required',

            'stok' => 'required|integer',
            'stok_minimum' => 'required|integer',

            'satuan' => 'required',

            'harga_jual' => 'required|integer',
            'harga_beli' => 'required|integer',

            'berat_ukuran' => 'nullable',
            'lokasi_simpan' => 'nullable',
            'deskripsi' => 'nullable',

            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        // upload foto
        if ($request->hasFile('foto')) {

            $validated['foto'] = $request
                ->file('foto')
                ->store('barang', 'public');
        }

        Barang::create($validated);

        return response()->json([
            'success' => true
        ]);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $validated = $request->validate([

            'nama' => 'required',
            'kategori_id' => 'required',

            'stok' => 'required|integer',
            'stok_minimum' => 'required|integer',

            'satuan' => 'required',

            'harga_jual' => 'required|integer',
            'harga_beli' => 'required|integer',

            'berat_ukuran' => 'nullable',
            'lokasi_simpan' => 'nullable',
            'deskripsi' => 'nullable',

            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        // jika upload foto baru
        if ($request->hasFile('foto')) {

            // hapus foto lama
            if (
                $barang->foto &&
                Storage::disk('public')->exists($barang->foto)
            ) {

                Storage::disk('public')->delete($barang->foto);
            }

            // upload foto baru
            $validated['foto'] = $request
                ->file('foto')
                ->store('barang', 'public');
        }

        $barang->update($validated);

        return response()->json([
            'success' => true
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);

        // hapus foto
        if (
            $barang->foto &&
            Storage::disk('public')->exists($barang->foto)
        ) {

            Storage::disk('public')->delete($barang->foto);
        }

        $barang->delete();

        return response()->json([
            'success' => true
        ]);
    }

    // DETAIL
    public function show($id)
    {
        $barang = Barang::with('kategori')
            ->findOrFail($id);

        return view(
            'barang.detail',
            compact('barang')
        );
    }
}
