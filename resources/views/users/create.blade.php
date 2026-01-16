@extends('admin.partials.app')
@section('main-content')

    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Create User</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create User</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row g-4">
                <!--begin::Col-->

                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-md-12">

                    <!--end::Different Width-->
                    <!--begin::Form Validation-->
                    <div class="card card-info card-outline mb-4">
                        <!--begin::Header-->
                        <div class="card-header">
                            <div class="card-title">Create User</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div style="color: red; font-size: 22px; padding: 12px;">{{ $error }}</div>
                            @endforeach
                        @endif

                        <form class="needs-validation" method="POST" action="{{ route('users.store') }}">
                            @csrf

                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif

                            <div class="card-body">
                                <div class="row">
                                    <!-- Name -->
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Full Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            value="{{ old('name') }}" required>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            value="{{ old('email') }}" required>
                                    </div>

                                    <!-- Password -->
                                    <div class="col-md-6">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" required>
                                    </div>

                                    <!-- Role Dropdown -->
                                    <div class="col-md-6">
                                        <label for="role" class="form-label">Role</label>
                                        <select class="form-select form-control" name="role_id" required>
                                            <option value="">Choose role...</option>

                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label d-flex justify-content-between align-items-center">
                                            <span>Permissions</span>
                                        </label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="select_all_permissions">
                                            <label class="form-check-label fw-bold" for="select_all_permissions">Select
                                                All</label>
                                        </div>
                                        <div class="row">
                                            @foreach ($permissions as $key => $label)
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input permission-checkbox" type="checkbox"
                                                            name="permissions[]" value="{{ $key }}"
                                                            id="perm_{{ $key }}">
                                                        <label class="form-check-label"
                                                            for="perm_{{ $key }}">{{ $label }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>


                                    <!-- Status Dropdown -->
                                    <div class="col-md-6">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select form-control" name="status" id="status" required>
                                            <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer mt-3">
                                <button class="btn btn-info" type="submit">Create User</button>
                            </div>
                        </form>



                        <!--end::Form-->
                        <!--begin::JavaScript-->
                        <script>
                            // Example starter JavaScript for disabling form submissions if there are invalid fields
                            (() => {
                                'use strict';

                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                const forms = document.querySelectorAll('.needs-validation');

                                // Loop over them and prevent submission
                                Array.from(forms).forEach((form) => {
                                    form.addEventListener(
                                        'submit',
                                        (event) => {
                                            if (!form.checkValidity()) {
                                                event.preventDefault();
                                                event.stopPropagation();
                                            }

                                            form.classList.add('was-validated');
                                        },
                                        false,
                                    );
                                });
                            })();
                        </script>
                        <!--end::JavaScript-->
                    </div>
                    <!--end::Form Validation-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->

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
    });
</script>
