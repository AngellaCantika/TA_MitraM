@extends($layout)
@section('content')

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

<div class="main" id="main">
    <div class="pagetitle">
        <h1>Daftar Alat Berat</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Daftar Alat Berat</li>
            </ol>
        </nav>
    </div>

    <div class="card-body">
        <a href="{{ route('alat_berat.create') }}" class="btn btn-primary">Tambah Alat Berat</a>
    </div>

    <section class="section">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Merk</th>
                        <th scope="col">Model</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Komponen Kerusakan</th>
                        <th scope="col">Penanggung Jawab</th>
                        <th scope="col">Foto Kendaraan</th>
                        <th scope="col">Status Perbaikan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alat_berat as $alat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $alat->merk }}</td>
                        <td>{{ $alat->model}}</td>
                        <td>{{ $alat->tanggal_masuk }}</td>
                        <td>{{ $alat->komponen_kerusakan }}</td>
                        <td>{{ $alat->mekanik->name }}</td>
                        <td>
                            @if($alat->foto)
                            <img src="{{ asset('uploads/' . $alat->foto) }}" alt="Foto Alat Berat"
                                style="width: 100px; height: auto;">
                            @endif
                        </td>
                        <td class="
                            @if($alat->status_perbaikan === 'Perbaikan') text-warning 
                            @elseif($alat->status_perbaikan == 'Sudah Selesai') text-success 
                            @elseif($alat->status_perbaikan == 'Pending') text-danger 
                            @endif">
                            <strong>{{ $alat->status_perbaikan }}</strong>
                        </td>
                        <td>
                            <a href="{{ route('alat_berat.edit', $alat->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>

@endsection