@extends('admin.partials.app')
@section('main-content')

<style>
    /* .form-control {
        font-size: 24px;
    }

    button.btn.btn-info {
        font-size: 26px;
    } */
</style>

<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Create About Page</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create About Page</li>
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
                        <div class="card-title">Create About Page</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->

                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <div style="color: red; font-size: 22px; padding: 12px;">{{ $error }}</div>
                    @endforeach
                    @endif

                    <form class="needs-validation" method="POST" action="{{ route('about-page.store') }}" enctype="multipart/form-data">
                        @csrf

                        @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                        @endif

                        <div class="card-body">
                            <div class="row g-3">
                                <!-- Title (Required) -->
                                <div class="col-md-6">
                                    <label for="title" class="form-label">About Title <span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        class="form-control"
                                        value="{{ old('name') }}"
                                        required>
                                </div>

                                <!-- Image (Optional) -->
                                <div class="col-md-6">
                                    <label for="image" class="form-label">About Image (optional)</label>
                                    <input
                                        type="file"
                                        name="image"
                                        id="image"
                                        class="form-control"
                                        accept=".jpg, .jpeg, .png">

                                </div>

                                <!-- Description (Optional) -->
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description (optional)</label>
                                    <textarea
                                        name="description"
                                        id="description"
                                        class="form-control summernote"
                                        rows="4">{{ old('description', $course->description ?? '') }}</textarea>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer mt-3">
                            <button class="btn btn-info" type="submit">Create Banner</button>
                            <a href="{{ route('banner.index') }}" class="btn btn-warning">Back</a>
                        </div>
                    </form>


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