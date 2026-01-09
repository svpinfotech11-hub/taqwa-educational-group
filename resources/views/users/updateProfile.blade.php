@extends('admin.partials.app')
@section('main-content')


<style>
    .form-control {
        font-size: 24px;
    }

    button.btn.btn-info {
        font-size: 26px;
    }
</style>

<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Update Profile</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Profile</li>
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

                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <div style="color: red; font-size: 22px; padding: 12px;">{{ $error }}</div>
                    @endforeach
                    @endif

                    <form class="needs-validation"
                        method="POST"
                        action="{{ route('admin.users.updateProMethods', $user->id) }}"
                        enctype="multipart/form-data">
                        @csrf

                        @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                        @endif

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Full Name -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        id="name"
                                        value="{{ old('name', $user->name) }}"
                                        required>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        id="email"
                                        value="{{ old('email', $user->email) }}"
                                        required>
                                </div>

                                <!-- Password -->
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input
                                        type="password"
                                        name="password"
                                        class="form-control"
                                        id="password"
                                        placeholder="Leave blank to keep current password">
                                </div>

                                <!-- Designation -->
                                <div class="col-md-6">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input
                                        type="text"
                                        name="designation"
                                        class="form-control"
                                        id="designation"
                                        value="{{ old('designation', $user->designation) }}">
                                </div>

                                <!-- Contact -->
                                <div class="col-md-6">
                                    <label for="contact" class="form-label">Contact</label>
                                    <input
                                        type="text"
                                        name="contact"
                                        class="form-control"
                                        id="contact"
                                        value="{{ old('contact', $user->contact) }}">
                                </div>

                                <!-- Address -->
                                <div class="col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <input
                                        type="text"
                                        name="address"
                                        class="form-control"
                                        id="address"
                                        value="{{ old('address', $user->address) }}">
                                </div>

                                <!-- Profile Photo -->
                                <div class="col-md-6">
                                    <label for="profile_photo" class="form-label">Profile Photo</label>
                                    <input
                                        type="file"
                                        name="profile_photo"
                                        class="form-control"
                                        id="profile_photo"
                                        accept="image/*">

                                    @if($user->profile_photo)
                                    <div class="mt-2">
                                        <img src="{{ asset($user->profile_photo) }}" alt="Profile Photo" width="100" height="100" class="rounded-circle border">
                                    </div>
                                    @endif
                                </div>

                            </div>
                        </div>

                        <div class="card-footer mt-3">
                            <button class="btn btn-info" type="submit">Update Profile</button>
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