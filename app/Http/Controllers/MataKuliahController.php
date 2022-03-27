<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\MataKuliah;

class MataKuliahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan Seluruh Data Mata Kuliah
    public function index()
    {
        $mata_kuliah = MataKuliah::all();

        return view('mata_kuliah', ['mata_kuliah' => $mata_kuliah]);
    }

    public function create()
    {
        return view('add_mata_kuliah');
    }

    // Memproses Data Form
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kd_matkul' => ['required', 'string', 'max:32'],
            'nama' => ['required', 'string', 'max:255'],
            'sks' => ['required', 'string', 'max:20'],
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'code' => 400], 400);
        }

        MataKuliah::create([
            'kd_matkul' => $request->input('kd_matkul'),
            'nama' => $request->input('nama'),
            'sks' => $request->input('sks')
        ]);

        return response()->json(['message' => 'Berhasil Menambahkan Data Mata Kuliah', 'code' => 201], 201);
    }

    public function edit($kd_matkul)
    {
        $mata_kuliah = MataKuliah::where('kd_matkul', $kd_matkul)->first();

        return view('edit_mata_kuliah', ['mata_kuliah' => $mata_kuliah]);
    }

    public function update($kd_matkul, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kd_matkul' => ['string', 'max:32'],
            'nama' => ['string', 'max:255'],
            'sks' => ['string', 'max:20'],
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'code' => 400], 400);
        }

        $affected = MataKuliah::where('kd_matkul', $kd_matkul)->update(
            [
                'kd_matkul' => $request->input('kd_matkul'),
                'nama' => $request->input('nama'),
                'sks' => $request->input('sks')
            ]
        );

        if ($affected == 0) {
            return response()->json(['message' => 'Gagal Mengupdate Data Mata Kuliah', 'code' => 404], 404);
        }

        return response()->json(['message' => 'Berhasil Mengupdate Data Mata Kuliah', 'code' => 201], 201);
    }

    // Menghapus Data Mata Kuliah
    public function destroy($kd_matkul)
    {
        MataKuliah::where('kd_matkul', $kd_matkul)->delete();
    }
}
