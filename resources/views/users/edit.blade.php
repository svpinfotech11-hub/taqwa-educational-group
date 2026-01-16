@extends('admin.partials.app')
@section('main-content')

    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Edit User</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
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
                            <div class="card-title">Edit User</div>
                        </div>

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div style="color: red; font-size: 22px; padding: 12px;">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <form class="needs-validation" method="POST" action="{{ route('users.update', $user->id) }}">
                            @csrf
                            @method('PUT')

                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif

                            <div class="card-body">
                                <div class="row">

                                    <!-- Name -->
                                    <div class="col-md-6">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name', $user->name) }}" required>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email', $user->email) }}" required>
                                    </div>

                                    <!-- Password -->
                                    <div class="col-md-6">
                                        <label class="form-label">Password (Leave blank if not change)</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>

                                    <!-- Role -->
                                    <div class="col-md-6">
                                        <label class="form-label">Role</label>
                                        <select class="form-select form-control" name="role_id" required>
                                            <option value="">Choose role...</option>

                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}"
                                                    {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <!-- Permissions -->
                                    <div class="mb-3 mt-3">
                                        <label class="form-label d-flex justify-content-between">
                                            <span>Permissions</span>
                                        </label>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="select_all_permissions">
                                            <label class="form-check-label fw-bold">Select All</label>
                                        </div>

                                        <div class="row">
                                            @foreach ($permissions as $key => $label)
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-check">

                                                        <input class="form-check-input permission-checkbox" type="checkbox"
                                                            name="permissions[]" value="{{ $key }}"
                                                            id="perm_{{ $key }}"
                                                            {{ in_array($key, $user_permissions) ? 'checked' : '' }}>

                                                        <label class="form-check-label" for="perm_{{ $key }}">
                                                            {{ $label }}
                                                        </label>

                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <label class="form-label">Status</label>
                                        <select class="form-select form-control" name="status" required>

                                            <option value="1"
                                                {{ old('status', $user->status) == '1' ? 'selected' : '' }}>
                                                Active
                                            </option>

                                            <option value="0"
                                                {{ old('status', $user->status) == '0' ? 'selected' : '' }}>
                                                Inactive
                                            </option>

                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer mt-3">
                                <button class="btn btn-info" type="submit">Update User</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {

        const selectAll = document.getElementById('select_all_permissions');
        const checkboxes = document.querySelectorAll('.permission-checkbox');

        selectAll.addEventListener('change', function() {
            checkboxes.forEach(cb => cb.checked = this.checked);
        });

        checkboxes.forEach(cb => {
            cb.addEventListener('change', function() {
                const allChecked = [...checkboxes].every(ch => ch.checked);
                selectAll.checked = allChecked;
            });
        });

        const allChecked = [...checkboxes].every(ch => ch.checked);
        selectAll.checked = allChecked;

    });
</script>
