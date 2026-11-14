<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeritaModel;

class BeritaController extends Controller
{
    public function index()
    {
        $data = BeritaModel::latest()->get();
        
        $data->transform(function ($item) {
            $item->foto_url = $item->foto
                ? asset('storage/' . $item->foto)
                : null;

            return $item;
        });

        return response()->json([
            'success' => true,
            'message' => 'Data berita berhasil diambil',
            'data' => $data
        ], 200);
    }

    public function show(int $id)
    {
        $data = BeritaModel::findOrFail($id);

        $data->foto_url = $data->foto
        ? asset('storage/' . $data->foto)
        : null;

        return response()->json([
            'success' => true,
            'message' => 'Detail berita berhasil diambil',
            'data' => $data
        ], 200);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'penulis' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('profil-berita', 'public');
        }

        $data = BeritaModel::create([
            'judul' => $validated['judul'],
            'isi' => $validated['isi'],
            'foto' => $foto,
            'penulis' => $validated['penulis'],
            'status' => $validated['status'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Berita berhasil ditambahkan',
            'data' => $data,
            'foto_url' => $foto ? asset('storage/' . $foto) : null,
        ], 201);
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'penulis' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('profil-berita', 'public');
        }

        $standar = BeritaModel::findOrFail($id);

        $standar->update([
            'judul' => $validated['judul'],
            'isi' => $validated['isi'],
            'foto' => $foto,
            'penulis' => $validated['penulis'],
            'status' => $validated['status'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Berita berhasil diupdate',
            'data' => $standar,
            'foto_url' => $foto ? asset('storage/' . $foto) : null,
        ], 200);
    }

    public function destroy(int $id)
    {
        $standar = BeritaModel::findOrFail($id);

        $standar->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berita berhasil dihapus'
        ], 200);
    }
    
}