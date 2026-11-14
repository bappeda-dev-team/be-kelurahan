<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StandartPelayananModel;
use Illuminate\Support\Facades\Validator;

class StandartPelayananController extends Controller
{
    public function index()
    {
        $data = StandartPelayananModel::latest()->get();
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Data standar pelayanan berhasil diambil',
            'data' => $data
        ], 200);
    }

    public function show(int $id)
    {
        $data = StandartPelayananModel::find($id);

        if (!$data) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Data standar pelayanan tidak ditemukan',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Detail standar pelayanan berhasil diambil',
            'data' => $data
        ], 200);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'persyaratan' => 'required|string|max:255',
            'tata_cara' => 'required|string|max:255',
            'waktu_penyelesaian' => 'required|string|max:255',
            'biaya' => 'required|string|max:255',
            'produk_layanan' => 'required|string|max:255',
            'pengelolaan_pengaduan' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'code' => 422,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $validated = $validator->validated();

        $data = StandartPelayananModel::create([
            'persyaratan' => $validated['persyaratan'],
            'tata_cara' => $validated['tata_cara'],
            'waktu_penyelesaian' => $validated['waktu_penyelesaian'],
            'biaya' => $validated['biaya'],
            'produk_layanan' => $validated['produk_layanan'],
            'pengelolaan_pengaduan' => $validated['pengelolaan_pengaduan'],
        ]);

        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'Standar pelayanan berhasil ditambahkan',
            'data' => $data
        ], 201);
    }

    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'persyaratan' => 'required|string|max:255',
            'tata_cara' => 'required|string|max:255',
            'waktu_penyelesaian' => 'required|string|max:255',
            'biaya' => 'required|string|max:255',
            'produk_layanan' => 'required|string|max:255',
            'pengelolaan_pengaduan' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'code' => 422,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $standar = StandartPelayananModel::find($id);

        if (!$standar) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Data standar pelayanan tidak ditemukan',
                'data' => null
            ], 404);
        }

        $validated = $validator->validated();

        $standar->update([
            'persyaratan' => $validated['persyaratan'],
            'tata_cara' => $validated['tata_cara'],
            'waktu_penyelesaian' => $validated['waktu_penyelesaian'],
            'biaya' => $validated['biaya'],
            'produk_layanan' => $validated['produk_layanan'],
            'pengelolaan_pengaduan' => $validated['pengelolaan_pengaduan'],
        ]);

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Standar pelayanan berhasil diupdate',
            'data' => $standar
        ], 200);
    }

    public function destroy(int $id)
    {
        $standar = StandartPelayananModel::find($id);

        if (!$standar) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Data standar pelayanan tidak ditemukan',
                'data' => null
            ], 404);
        }

        $standar->delete();

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Standar pelayanan berhasil dihapus',
            'data' => null
        ], 200);
    }
    
}