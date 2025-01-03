<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    // Menampilkan daftar galeri
    public function index()
    {
        $galeris = Galeri::paginate(4);
        return view('back.galeri.index', compact('galeris'));
    }

    // Menampilkan form tambah galeri
    public function create()
    {
        return view('back.galeri.create');
    }

    // Menyimpan galeri baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'value' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images_galeri', 'public'); // Simpan di storage/public/images
        }

        Galeri::create([
            'name' => $request->name,
            'value' => $request->value,
            'image' => $imagePath,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    // Menampilkan detail galeri
    public function show(Galeri $galeri)
    {
        return view('galeri.show', compact('galeri'));
    }

    // Menampilkan form edit galeri
    public function edit(Galeri $galeri)
    {
        return view('back.galeri.edit', compact('galeri'));
    }

    // Memperbarui galeri
    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'value' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $galeri->image;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($imagePath) {
                \Storage::delete('public/' . $imagePath);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $galeri->update([
            'name' => $request->name,
            'value' => $request->value,
            'image' => $imagePath,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    // Menghapus galeri
    public function destroy(Galeri $galeri)
    {
        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }
}
