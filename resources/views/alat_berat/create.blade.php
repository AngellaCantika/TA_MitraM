@extends($layout)

@section('content')
<main class="main" id="main">
    <div class="pagetitle">
        <h1>Tambah Alat Berat</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/alat-berat">Daftar Alat Berat</a></li>
                <li class="breadcrumb-item active">Tambah Alat Berat</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Masukan Data Alat Berat</h5>

                    <form action="{{ route('alat_berat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="merk" class="col-sm-2 col-form-label">Merk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="merk" id="merk" value="{{ old('merk') }}"
                                    required>
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
                            <label for="tanggal_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk"
                                    value="{{ old('tanggal_masuk') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="komponen_kerusakan" class="col-sm-2 col-form-label">Komponen Bagian
                                Kerusakan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="komponen_kerusakan"
                                    id="komponen_kerusakan" value="{{ old('komponen_kerusakan') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="penanggung_jawab" class="col-sm-2 col-form-label">Penanggung Jawab</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="penanggung_jawab" id="penanggung_jawab" required>
                                    <option value="">Pilih Penanggung Jawab</option>
                                    @foreach($mekanik as $mek)
                                    <option value="{{ $mek->id }}" {{ old('penanggung_jawab')==$mek->id ? 'selected' :
                                        '' }}>{{ $mek->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="foto" class="col-sm-2 col-form-label">Foto Alat Berat</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" name="foto" id="foto" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status_perbaikan" class="col-sm-2 col-form-label">Status Perbaikan</label>
                            <div class="col-sm-10">
                                <select name="status_perbaikan" id="status_perbaikan" class="form-select" required>
                                    <option value="Pending">Pending</option>
                                    <option value="Perbaikan">Perbaikan</option>
                                    <option value="Sudah Selesai">Sudah Selesai</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Tambah Data</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection