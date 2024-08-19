@extends('layouts.admin.mainAdmin')
@section('adminContent')

<main class="main" id="main">
    <div class="paagetitle">
        <h1>Edit Data User</h1>

        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/user">Daftar User</a></li>
                <li class="breadcrumb-item">Edit Data User</li>
            </ol>
        </nav>
    </div>

    <div class="section">
        <div class="row">
            <div class="card">
                <h5 class="card-title">Edit Data User</h5>

                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('user.update', $user->id) }}" method="post">

                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label" id="name">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name', $user->name) }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" id="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" id="name" class="form-control"
                                value="{{ old('email', $user->email) }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" id="password" name="password" class="form-control">
                            <small class="text-muted">Kosongkan jika tidak ingin diubah</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password_confirmation" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="role_id" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <select name="role_id" id="role_id" class="form-select" required>
                                @foreach($roles as $id => $role)
                                <option value="{{ $id }}" {{ $user->role_id == $id ? 'selected' : '' }}>{{ $role }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <button class="btn btn-primary" type="submit">Update User</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</main>

@endsection