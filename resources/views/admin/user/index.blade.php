@extends('layouts.admin.mainAdmin')
@section('adminContent')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Daftar User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Daftar User</li>
            </ol>
        </nav>
    </div>

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card-body">
        <a href="{{ url('/admin/user/create') }}" class="btn btn-primary">Tambah User</a>
    </div>

    <section class="section">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->role_name == 'Admin')
                            <span class="badge bg-primary">{{ $user->role_name }}</span>
                            @elseif($user->role_name == 'Mekanik')
                            <span class="badge bg-warning">{{ $user->role_name }}</span>
                            @elseif($user->role_name == 'User')
                            <span class="badge bg-success">{{ $user->role_name }}</span>
                            @else
                            <span class="badge bg-secondary">{{ $user->role_name }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                            @if($user->role_id == 2)
                            <form action="{{ route('user.destroy', $user->id) }}" method="post" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus user ini ?')">Delete</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</main>

@endsection