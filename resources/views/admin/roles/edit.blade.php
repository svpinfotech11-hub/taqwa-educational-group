@extends('admin.partials.app')
@section('main-content')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Edit Role</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Role</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-md-12">
                    <div class="card card-info card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Edit Role</div>
                        </div>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div style="color: red; font-size: 22px; padding: 12px;">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                        <form method="POST" action="{{ route('roles.update', $role->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label">Role Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $role->name }}" required>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-success">Update Role</button>
                                    <a href="{{ route('roles.index') }}" class="btn btn-secondary">
                                        Back
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endsection
