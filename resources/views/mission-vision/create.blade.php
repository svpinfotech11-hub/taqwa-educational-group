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
                <h3 class="mb-0">Create Mission & Vision</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Mission & Vision</li>
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
                        <div class="card-title">Create Mission & Vision</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->

                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <div style="color: red; font-size: 22px; padding: 12px;">{{ $error }}</div>
                    @endforeach
                    @endif
                    <form class="needs-validation" method="POST" action="{{ route('mission-vision.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                            <div class="row g-3">

                                <!-- Type -->
                                <div class="col-md-6">
                                    <label for="type" class="form-label">Section Type <span class="text-danger">*</span></label>
                                    <select name="type" id="type" class="form-select" required>
                                        <option value="">Select Section</option>
                                        <option value="mission" {{ old('type') == 'mission' ? 'selected' : '' }}>Mission</option>
                                        <option value="vision" {{ old('type') == 'vision' ? 'selected' : '' }}>Vision</option>
                                        <option value="objective" {{ old('type') == 'objective' ? 'selected' : '' }}>Objective</option>
                                    </select>
                                    @error('type')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Title -->
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        placeholder="Enter title (only for Mission or Vision)"
                                        value="{{ old('title') }}">
                                    @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                    <textarea name="description" id="description" class="form-control summernote" rows="5" placeholder="Enter description">{{ old('description') }}</textarea>
                                    @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <hr>
                                <h5 class="mb-3">Media (Optional)</h5>

                                <!-- Images -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Images</label>
                                    <div id="image-wrapper">
                                        <div class="d-flex mb-2">
                                            <input type="file" name="images[]" class="form-control me-2" accept="image/*">
                                            <button type="button" class="btn btn-success add-image">+</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Videos -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Videos</label>
                                    <div id="video-wrapper">
                                        <div class="d-flex mb-2">
                                            <input type="file" name="videos[]" class="form-control me-2" accept="video/*">
                                            <button type="button" class="btn btn-success add-video">+</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- YouTube Links with Description -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">YouTube Links</label>
                                    <div id="youtube-wrapper">
                                        <div class="row mb-2 align-items-center">
                                            <div class="col-md-5">
                                                <input type="text" name="youtube_links[]" class="form-control"
                                                    placeholder="YouTube URL">
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="youtube_descriptions[]" class="form-control"
                                                    placeholder="Description (optional)">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-success add-youtube w-100">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer mt-3 text-end">
                            <button class="btn btn-primary" type="submit">Save Section</button>
                            <a href="{{ route('mission-vision.index') }}" class="btn btn-secondary">Back</a>
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


<script>
document.addEventListener('click', function (e) {

    // Images
    if (e.target.classList.contains('add-image')) {
        document.getElementById('image-wrapper').insertAdjacentHTML('beforeend', `
            <div class="d-flex mb-2">
                <input type="file" name="images[]" class="form-control me-2" accept="image/*">
                <button type="button" class="btn btn-danger remove">×</button>
            </div>
        `);
    }

    // Videos
    if (e.target.classList.contains('add-video')) {
        document.getElementById('video-wrapper').insertAdjacentHTML('beforeend', `
            <div class="d-flex mb-2">
                <input type="file" name="videos[]" class="form-control me-2" accept="video/*">
                <button type="button" class="btn btn-danger remove">×</button>
            </div>
        `);
    }

    // YouTube
    if (e.target.classList.contains('add-youtube')) {
        document.getElementById('youtube-wrapper').insertAdjacentHTML('beforeend', `
            <div class="row mb-2 align-items-center">
                <div class="col-md-6">
                    <input type="text" name="youtube_links[]" class="form-control"
                           placeholder="YouTube URL">
                </div>
                <div class="col-md-6">
                    <input type="text" name="youtube_descriptions[]" class="form-control"
                           placeholder="Description (optional)">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger remove w-100">×</button>
                </div>
            </div>
        `);
    }

    // Remove
    if (e.target.classList.contains('remove')) {
        e.target.closest('.d-flex, .row').remove();
    }
});
</script>


@endsection