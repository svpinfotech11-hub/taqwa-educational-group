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
                <h3 class="mb-0">Update Banner</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Banner</li>
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
                        <div class="card-title">Update Banner</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->

                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <div style="color: red; font-size: 22px; padding: 12px;">{{ $error }}</div>
                    @endforeach
                    @endif

                    <form class="needs-validation" method="POST" action="{{ route('banner.update', $banner->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                        @endif

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Title (Required) -->
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Banner Title <span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        name="title"
                                        id="title"
                                        class="form-control"
                                        value="{{ old('title', $banner->title) }}"
                                        required>
                                </div>

                                <!-- Image (Optional) -->
                                <div class="col-md-6">
                                    <label for="image" class="form-label">Banner Image (optional)</label>
                                    <input
                                        type="file"
                                        name="image"
                                        id="image"
                                        class="form-control"
                                        accept=".jpg, .jpeg, .png">

                                    <!-- Current Image Preview -->
                                    @if($banner->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('banners/' .$banner->image) }}" alt="Current Banner" width="120" class="rounded border">
                                        <p class="text-muted small mt-1 mb-0">Current Image</p>
                                    </div>
                                    @endif
                                </div>

                                <!-- Description (Optional) -->
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description (optional)</label>
                                    <textarea
                                        name="description"
                                        id="description"
                                        class="form-control"
                                        rows="4">{{ old('description', $banner->description) }}</textarea>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer mt-3">
                            <button class="btn btn-success" type="submit">Update Banner</button>
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