@extends('layouts.user.mainUser')
@section('UserContent')

<main class="main" id="main">
    <div class="pagetitle">
        <h1>Daftar Perbaikan Mobil</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Home</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Merek</th>
                        <th scope="col">Model</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Plat Nomor</th>
                        <th scope="col">Status Perbaikan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mobil as $m)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $m->merek }}</td>
                        <td>{{ $m->model }}</td>
                        <td>{{ $m->tgl_masuk }}</td>
                        <td>{{ $m->plat_nomer }}</td>
                        <td class="
                        @if($m->status_perbaikan == 'Perbaikan') 
                            text-warning
                            @elseif($m->status_perbaikan == 'Sudah Selesai')
                            text-success
                            @elseif($m->status_perbaikan == 'Pending')
                            text-danger
                            @endif
                            "><strong>{{ $m->status_perbaikan }}</strong></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</main>

@endsection