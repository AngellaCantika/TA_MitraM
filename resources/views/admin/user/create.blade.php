@extends('layouts.admin.mainAdmin')
@section('adminContent')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Data Mobil</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/mobil">Daftar Users</a></li>
                <li class="breadcrumb-item active">Tambah Data User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Masukan data User</h5>

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
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" id="password" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password_confirmation" class="col-sm-2 col-form-label">Konfirmasi
                                    Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class=" form-control" id="password_confirmation"
                                        name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="role_id" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="role_id" name="role_id" required>
                                        @foreach($roles as $id => $role)
                                        <option value="{{ $id }}">{{ $role }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
<!-- End #main -->

<script>
    function validateForm() {
        const password = document.getElementById('password').value;
        if(password.length < 8) {
            alert('Password Harus Memiliki Panjang Minimal 8 Karakter');
            return false;
        }
        return true;
    }
</script>



@endsection