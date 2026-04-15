@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center bg-dark text-white">
        <h5 class="mb-0">Kelola User & Operator</h5>
        <a href="{{ route('admin.users.create') }}" class="btn btn-light btn-sm">+ User Baru</a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="badge {{ $user->id_level == 1 ? 'bg-danger' : ($user->id_level == 3 ? 'bg-success' : 'bg-warning') }}">
                            {{ $user->level->level_name }}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection