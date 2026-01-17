@extends('admin.partials.app')
@section('main-content')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Roles Management</h3>
                </div>
                <div class="col-sm-6 text-end">
                    <a href="{{ route('roles.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus"></i> Add Role
                    </a>
                </div>

            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-body">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Role Name</th>
                                <th width="150">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                                <tr>

                                    <td>{{ $key + 1 }}</td>

                                    <td>{{ $role->name }}</td>
                                    <td>

                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-info">
                                            Edit
                                        </a>
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-sm btn-danger"
                                                onclick="return confirm('Delete this role?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
