@extends('layouts.mekanik.mainMekanik')
@section('mekanikContent')

<style>
    /* Text untuk Status Perbaikan */

    .text-warning {
        background-color: #fff3cd;
        color: #856404;
        padding: 5px;
        border-radius: 5px;
    }

    .text-success {
        background-color: #d4edda;
        color: #155724;
        padding: 5px;
        border-radius: 5px;
    }

    .text-danger {
        background-color: #f8d7da;
        color: #721c24;
        padding: 5px;
        border-radius: 5px;
    }
</style>

<main id="main" class="main">

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
        <a href="{{ route('mekanik.daftar_mobil.create') }}" class="btn btn-primary">Tambah Data Mobil</a>
    </div>
    <!-- End Page Title -->
    <section class="section">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Merk</th>
                        <th scope="col">Model</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Plat Nomor</th>
                        <th scope="col">Status Perbaikan</th>
                        <th scope="col">Penaggung Jawab</th>
                        <th scope="col">Komponen Kerusakan</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
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
                            <a href="{{ route('mekanik.daftar_mobil.edit', $mobil->id) }}"
                                class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    @endsection