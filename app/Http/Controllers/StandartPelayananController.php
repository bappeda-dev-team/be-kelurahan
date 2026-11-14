<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StandartPelayananModel;

class StandartPelayananController extends Controller
{
    public function index()
    {
        $data = StandartPelayananModel::latest()->get();
        return response()->json([
            'success' => true,
            'message' => 'Data standar pelayanan berhasil diambil',
            'data' => $data
        ], 200);
    }

    public function show(int $id)
    {
        $data = StandartPelayananModel::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail standar pelayanan berhasil diambil',
            'data' => $data
        ], 200);
    }

    public function create(Request $request)
    {
        $request->validate([
            'persyaratan' => 'required|string|max:255',
            'tata_cara' => 'required|string|max:255',
            'waktu_penyelesaian' => 'required|string|max:255',
            'biaya' => 'required|string|max:255',
            'produk_layanan' => 'required|string|max:255',
            'pengelolaan_pengaduan' => 'required|string|max:255',
        ]);

        $data = StandartPelayananModel::create([
            'persyaratan' => $request->persyaratan,
            'tata_cara' => $request->tata_cara,
            'waktu_pelayanan' => $request->waktu_pelayanan,
            'biaya' => $request->biaya,
            'produk_layanan' => $request->produk_layanan,
            'pengelolaan_pengaduan' => $request->pengelolaan_pengaduan,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Standar pelayanan berhasil ditambahkan',
            'data' => $data
        ], 201);
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'persyaratan' => 'required|string|max:255',
            'tata_cara' => 'required|string|max:255',
            'waktu_penyelesaian' => 'required|string|max:255',
            'biaya' => 'required|string|max:255',
            'produk_layanan' => 'required|string|max:255',
            'pengelolaan_pengaduan' => 'required|string|max:255',
        ]);

        $standar = StandartPelayananModel::findOrFail($id);

        $standar->update([
            'persyaratan' => $request->persyaratan,
            'tata_cara' => $request->tata_cara,
            'waktu_pelayanan' => $request->waktu_pelayanan,
            'biaya' => $request->biaya,
            'produk_layanan' => $request->produk_layanan,
            'pengelolaan_pengaduan' => $request->pengelolaan_pengaduan,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Standar pelayanan berhasil diupdate',
            'data' => $standar
        ], 200);
    }

    public function destroy(int $id)
    {
        $standar = StandartPelayananModel::findOrFail($id);

        $standar->delete();

        return response()->json([
            'success' => true,
            'message' => 'Standar pelayanan berhasil dihapus'
        ], 200);
    }
    
}