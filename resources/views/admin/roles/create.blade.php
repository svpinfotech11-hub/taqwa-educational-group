@extends('admin.partials.app')
@section('main-content')
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Create Role</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Role</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>

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
                            <div class="card-title">Create Role</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div style="color: red; font-size: 22px; padding: 12px;">{{ $error }}</div>
                            @endforeach
                        @endif

                        <form method="POST" action="{{ route('roles.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="row">

                                    <div class="mb-3">
                                        <label>Role Name</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <button class="btn btn-primary">Create Role</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
