@extends('layouts.mekanik.mainMekanik')

@section('mekanikContent')

<main class="main" id="main">

    <div class="pagetitle">
        <h1>Edit Data Mobil</h1>

        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/mekanik/mobil">Daftar Mobil</a></li>
                <li class="breadcrumb-item">Edit Data Mobil</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="card">
                <h5 class="card-title">Edit Data Mobil</h5>

                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('mekanik.daftar_mobil.update', $daftarMobil->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="merk" class="col-sm-2 col-form-label">Merk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="merk" id="merk"
                                value="{{ old('merk', $daftarMobil->merk) }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="model" class="col-sm-2 col-form-label">Model</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="model" id="model"
                                value="{{ old('model', $daftarMobil->model) }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tgl_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tgl_masuk" id="tgl_masuk"
                                value="{{ old('tgl_masuk', $daftarMobil->tgl_masuk) }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="plat_nomer" class="col-sm-2 col-form-label">Plat Nomer</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="plat_nomer" id="plat_nomer"
                                value="{{ old('plat_nomer', $daftarMobil->plat_nomer) }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Status Perbaikan</label>
                        <div class="col-sm-10">
                            <select name="status_perbaikan" id="status_perbaikan" class="form-select"
                                aria-label="Default select example">
                                <option value="Pending" {{ $daftarMobil->status_perbaikan == 'Pending' ? 'selected' : ''
                                    }}>Pending</option>
                                <option value="Perbaikan" {{ $daftarMobil->status_perbaikan == 'Perbaikan' ? 'selected'
                                    : ''}}>Perbaikan</option>
                                <option value="Selesai" {{ $daftarMobil->status_perbaikan == 'Selesai' ? 'selected' :
                                    ''}}>Selesai</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="penanggung_jawab" class="col-sm-2 col-form-label">Penanggung Jawab</label>
                        <div class="col-sm-10">
                            <select name="penanggung_jawab" id="penanggung_jawab" class="form-control">
                                @foreach ($penanggungJawabs as $penanggungJawab)
                                <option value="{{ $penanggungJawab->id }}" {{ $daftarMobil->penanggung_jawab ==
                                    $penanggungJawab->id ? 'selected' : '' }}>{{ $penanggungJawab->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="komponen_kerusakan" class="col-sm-2 col-form-label">Komponen Kerusakaan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="komponen_kerusakan" id="komponen_kerusakan"
                                value="{{ old('merk', $daftarMobil->komponen_kerusakan) }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="foto" class="col-sm-2 col-form-label">Foto Kendaraan</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" name="foto" id="foto">
                            @if ($daftarMobil->foto)
                            <img src="{{ asset('uploads/'.$daftarMobil->foto) }}" alt="Foto Kendaraan"
                                style="width: 100px; height: auto;">
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Update Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

@endsection