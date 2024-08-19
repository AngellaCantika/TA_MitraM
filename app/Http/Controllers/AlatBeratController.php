<?php

namespace App\Http\Controllers;

use App\Models\AlatBerat;
use App\Models\User;
use Illuminate\Http\Request;

class AlatBeratController extends Controller
{
    public function index()
    {
        $alat_berat = AlatBerat::all();
        return view('alat_berat.index', compact('alat_berat'));
    }

    public function create()
    {
        $mekanik = User::where('role_id', 2)->get(); // Assuming role_id 2 is for Mekanik

        return view('alat_berat.create', compact('mekanik'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'merk' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'komponen_kerusakan' => 'required|string|max:255',
            'penanggung_jawab' => 'required|exists:users,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status_perbaikan' => 'required|string|in:Perbaikan,Sudah Selesai,Pending',
        ]);

        $data = $request->all();

        if($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads'), $fileName);
            $data['foto'] = $fileName;
        }

        AlatBerat::create($data);
        return redirect()->route('alat_berat.index')->with('success', 'Alat berat berhasil ditambahkan.');
    }

    public function show($id)
    {
        $alat_berat = AlatBerat::findOrFail($id);
        return view('alat_berat.show', compact('alat_berat'));
    }

    public function edit($id)
    {
        $alat_berat = AlatBerat::findOrFail($id);

        $mekanik = User::where('role_id', 2)->get(); // Assuming role_id 2 is for Mekanik

        return view('alat_berat.edit', compact('alat_berat', 'mekanik'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'merk' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'komponen_kerusakan' => 'required|string|max:255',
            'penanggung_jawab' => 'required|exists:users,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status_perbaikan' => 'required|string|in:Perbaikan,Sudah Selesai,Pending',
        ]);

        $alat_berat = AlatBerat::findOrFail($id);

        $data = $request->except(['foto']);

        if($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads'), $fileName);
            $data['foto'] = $fileName;
        } else {
            $data['foto'] = $alat_berat->foto;
        }

        $alat_berat->update($data);

        return redirect()->route('alat_berat.index')->with('success', 'Alat berat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $alat_berat = AlatBerat::findOrFail($id);
        $alat_berat->delete();

        return redirect()->route('alat_berat.index')->with('success', 'Alat berat berhasil dihapus.');
    }
}
