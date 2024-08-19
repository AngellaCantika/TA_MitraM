@extends('layouts.admin')
@section('content')

<div class="main" id="main">
    <div class="pagetitle">
        <h1>Daftar Mobil</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Daftar Mobil</li>
            </ol>
        </nav>
    </div>

    <div class="card-body">
        <a href="{{ route('daftar_mobil.create') }}" class="btn btn-primary">Tambah Data Mobil</a>
    </div>

    <section class="section">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th class="scope">#</th>
                        <th class="scope">Merk</th>
                        <th class="scope">Model</th>
                        <th class="scope">Tanggal Masuk</th>
                        <th class="scope">Plat Nomor</th>
                        <th class="scope">Status Perbaikan</th>
                        <th class="scope">Penanggung Jawab</th>
                        <th class="scope">Komponen Kerusakan</th>
                        <th class="scope">Foto</th>
                        <th class="scope">Action</th>
                    </tr>
                </thead>
                @foreach ($daftarMobil as $mobil)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mobil->merk }}</td>
                    <td>{{ $mobil->model }}</td>
                    <td>{{ $mobil->tgl_masuk }}</td>
                    <td>{{ $mobil->plat_nomer }}</td>
                    <td class="
                    @if($mobil->status_perbaikan === 'Perbaikan') text-warning 
                    @elseif($mobil->status_perbaikan == 'Selesai') text-success 
                    @elseif($mobil->status_perbaikan == 'Pending') text-danger 
                    @endif">
                        <strong>{{ $mobil->status_perbaikan }}</strong>
                    </td>
                    <td>{{ $mobil->penanggungJawab->name }}</td>
                    <td>{{ $mobil->komponen_kerusakan }}</td>
                    <td>
                        @if($mobil->foto)
                        <img src="{{ asset('uploads/' . $mobil->foto) }}" alt="Foto Kendaraan"
                            style="width: 100px; height: auto;">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('daftar_mobil.edit', $mobil->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
                @endforeach
                <tbody>
                </tbody>
            </table>
        </div>
    </section>
</div>

@endsection