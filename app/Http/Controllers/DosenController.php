<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Dosen;

class DosenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan Seluruh Data Dosen
    public function index()
    {
        $dosens = Dosen::all();

        return view('dosen', ['dosens' => $dosens]);
    }

    public function create()
    {
        return view('add_dosen');
    }

    // Memproses Data Form
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string'],
            'alamat' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'code' => 400], 400);
        }

        Dosen::create([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat')
        ]);

        return response()->json(['message' => 'Berhasil Menambahkan Data Dosen', 'code' => 201], 201);
    }

    public function edit($id)
    {
        $dosen = Dosen::where('id', $id)->select('nama', 'alamat')->first();

        return view('edit_dosen', ['dosen' => $dosen]);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['string'],
            'alamat' => ['string'],
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'code' => 400], 400);
        }

        $affected = Dosen::where('id', $id)->update(
            [
                'nama' => $request->input('nama'),
                'alamat' => $request->input('alamat')
            ]
        );

        if ($affected == 0) {
            return response()->json(['message' => 'Gagal Mengupdate Data Dosen', 'code' => 404], 404);
        }

        return response()->json(['message' => 'Berhasil Mengupdate Data Dosen', 'code' => 201], 201);
    }

    // Menghapus Data Dosen
    public function destroy($id)
    {
        Dosen::where('id', $id)->delete();
    }
}
