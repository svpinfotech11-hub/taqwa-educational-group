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
                <h3 class="mb-0">Create NEET Domicile Criteria</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create NEET Domicile Criteria</li>
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
                        <div class="card-title">Create NEET Domicile Criteria</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->

                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <div style="color: red; font-size: 22px; padding: 12px;">{{ $error }}</div>
                    @endforeach
                    @endif

                    <form class="needs-validation" method="POST" action="{{ route('neet-domiciles.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            {{-- Success Message --}}
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                            <div class="row g-3">
                                <!-- State Name -->
                                <div class="col-md-6">
                                    <label for="state_name" class="form-label">State Name <span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        name="state_name"
                                        id="state_name"
                                        class="form-control"
                                        placeholder="e.g., Karnataka"
                                        value="{{ old('state_name') }}"
                                        required>
                                    @error('state_name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Title -->
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        name="title"
                                        id="title"
                                        class="form-control"
                                        placeholder="Enter title, e.g., NEET Domicile Criteria for Karnataka"
                                        value="{{ old('title') }}"
                                        required>
                                    @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Optional Image -->
                                <!-- <div class="col-md-6">
                                    <label for="image" class="form-label">Image (optional)</label>
                                    <input
                                        type="file"
                                        name="image"
                                        id="image"
                                        class="form-control"
                                        accept=".jpg, .jpeg, .png">
                                    @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div> -->

                                <!-- Description -->
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                    <textarea
                                        name="description"
                                        id="description"
                                        class="form-control summernote"
                                        rows="5"
                                        placeholder="Enter detailed NEET domicile criteria...">{{ old('description') }}</textarea>
                                    @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer mt-3 text-end">
                            <button class="btn btn-primary" type="submit">Save NEET Domicile Criteria</button>
                            <a href="{{ route('neet-domiciles.index') }}" class="btn btn-secondary">Back</a>
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