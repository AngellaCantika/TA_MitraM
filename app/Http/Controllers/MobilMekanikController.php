<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarMobil;
use App\Models\User;

class MobilMekanikController extends Controller {

    public function index() {
        $daftarMobil = DaftarMobil::with('penanggungJawab')->get();
        return view('mekanik.mobil.index', compact('daftarMobil'));
    }

    public function create() {
        $penanggungJawabs = User::where('role_id', 2)->get();
        return view('mekanik.mobil.create', compact('penanggungJawabs'));
    }

    public function store(Request $request) {
        $request->validate([
            'merk' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'tgl_masuk' => 'required|date',
            'plat_nomer' => 'required|string|max:50|unique:daftar_mobil,plat_nomer',
            'status_perbaikan' => 'required|in:Pending,Perbaikan,Selesai',
            'penanggung_jawab' => 'required|exists:users,id',
            'komponen_kerusakan' => 'required|string|max:255',
            'foto' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'plat_nomer.unique' => 'Plat Nomor Sudah ada. Mohon Gunakan Plat Nomor Lain.'
        ]);

        $data = $request->all();
        

        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads'), $fileName);
            $data['foto'] = $fileName;
        }

        DaftarMobil::create($data);
        return redirect()->route('mekanik.daftar_mobil.index')->with('success', 'Data mobil berhasil ditambahkan');
    }

    public function edit($id) {
        $daftarMobil = DaftarMobil::findOrFail($id);
        $penanggungJawabs = User::where('role_id', 2)->get();
        return view('mekanik.mobil.edit', compact('daftarMobil', 'penanggungJawabs'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'merk' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'tgl_masuk' => 'required|date',
            'plat_nomer' => 'required|string|max:50|unique:daftar_mobil,plat_nomer,' . $id,
            'status_perbaikan' => 'required|in:Pending,Perbaikan,Selesai',
            'penanggung_jawab' => 'required|exists:users,id',
            'komponen_kerusakan' => 'required|string|max:255',
            'foto' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'plat_nomer' => 'Plat Nomor Sudah Ada, Mohon Gunakan Plat Nomor Lain.'
        ]);

        $daftarMobil = DaftarMobil::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('foto')) {
            $fileName = time(). '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads'), $fileName);
            $data['foto'] = $fileName;
        }

        $daftarMobil->update($data);
        return redirect()->route('mekanik.daftar_mobil.index')->with('success', 'Data Mobil berhasil diperbarui.');
    }

    public function destroy($id) {
        $daftarMobil = DaftarMobil::findOrFail($id);
        $daftarMobil->delete();

        return redirect()->route('mekanik.daftar_mobil.index')->with('success', 'Data Mobil Berhasil di hapus!');
    }
}
