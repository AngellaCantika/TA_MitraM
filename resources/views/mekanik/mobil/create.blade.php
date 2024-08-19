@extends('layouts.mekanik.mainMekanik')

@section('mekanikContent')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Data Mobil</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/mekanik/mobil">Daftar Mobil</a></li>
                <li class="breadcrumb-item active">Tambah Data Mobil</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Masukan data mobil</h5>

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <!-- General Form Elements -->
                        <form action="{{ route('mekanik.daftar_mobil.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="merk" class="col-sm-2 col-form-label">Merk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="merk" id="merk"
                                        value="{{ old('merk') }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="model" class="col-sm-2 col-form-label">Model</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="model" id="model"
                                        value="{{ old('model') }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tgl_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tgl_masuk" id="tgl_masuk"
                                        value="{{ old('tgl_masuk') }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="plat_nomer" class="col-sm-2 col-form-label">Plat Nomor</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="plat_nomer" id="plat_nomer"
                                        value="{{ old('plat_nomer') }}" required>
                                    @if ($errors->has('plat_nomer'))
                                    <span class="text-danger">{{ $errors->first('plat_nomer') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Status Perbaikan</label>
                                <div class="col-sm-10">
                                    <select name="status_perbaikan" id="status_perbaikan" class="form-select" required>
                                        <option value="Pending" {{ old('status_perbaikan')=='Pending' ? 'selected' : ''
                                            }}>Pending</option>
                                        <option value="Perbaikan" {{ old('status_perbaikan')=='Perbaikan' ? 'selected'
                                            : '' }}>Perbaikan</option>
                                        <option value="Selesai" {{ old('status_perbaikan')=='Selesai' ? 'selected' : ''
                                            }}>Selesai</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="penanggung_jawab" class="col-sm-2 col-form-label">Penanggung Jawab</label>
                                <div class="col-sm-10">
                                    <select name="penanggung_jawab" id="penanggung_jawab" class="form-select" required>
                                        @foreach ($penanggungJawabs as $penanggungJawab)
                                        <option value="{{ $penanggungJawab->id }}" {{
                                            old('penanggung_jawab')==$penanggungJawab->id ? 'selected' : '' }}>{{
                                            $penanggungJawab->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="komponen_kerusakan" class="col-sm-2 col-form-label">Komponen
                                    Kerusakan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="komponen_kerusakan"
                                        id="komponen_kerusakan" value="{{ old('komponen_kerusakan') }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="foto" id="foto"
                                        value="{{ old('foto') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                                </div>
                            </div>
                        </form>
                        <!-- End General Form Elements -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection