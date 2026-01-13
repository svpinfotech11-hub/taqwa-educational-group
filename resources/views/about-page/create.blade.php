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

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div style="color: red; font-size: 22px; padding: 12px;">{{ $error }}</div>
                            @endforeach
                        @endif

                        <form class="needs-validation" method="POST" action="{{ route('about-page.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif

                            <div class="card-body">
                                <div class="row g-3">
                                    <!-- Title (Required) -->
                                    <div class="col-md-6">
                                        <label for="title" class="form-label">About Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ old('name') }}" required>
                                    </div>

                                    <!-- Description (Optional) -->
                                    <div class="col-md-12">
                                        <label for="description" class="form-label">Description (optional)</label>
                                        <textarea name="description" id="description" class="form-control summernote" rows="4">{{ old('description', $course->description ?? '') }}</textarea>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label">Images / Videos / Links</label>

                                        <div id="item-wrapper">

                                            <!-- First Row -->
                                            <div class="row g-2 mb-3 item-row">
                                                <div class="col-md-3">
                                                    <input type="file" name="images[]" class="form-control"
                                                        accept=".jpg,.jpeg,.png,.webp,image/*">
                                                </div>

                                                <div class="col-md-3">
                                                    <input type="file" name="videos[]" class="form-control"
                                                        accept=".mp4,.mov,.avi,.mkv,video/*">
                                                </div>

                                                <div class="col-md-4">
                                                    <input type="text" name="links[]" class="form-control"
                                                        placeholder="https://example.com">
                                                </div>

                                                <div class="col-md-2 d-flex gap-1">
                                                    <button type="button" class="btn btn-success add-item">+</button>
                                                    <button type="button" class="btn btn-danger remove-item">−</button>
                                                </div>
                                            </div>

                                        </div>
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

<script>
    document.addEventListener('click', function(e) {

        if (e.target.classList.contains('add-item')) {

            let wrapper = document.getElementById('item-wrapper');

            let row = `
        <div class="row g-2 mb-3 item-row">
            <div class="col-md-3">
                <input type="file" name="images[]" class="form-control" accept="image/*">
            </div>

            <div class="col-md-3">
                <input type="file" name="videos[]" class="form-control" accept="video/*">
            </div>

            <div class="col-md-4">
                <input type="text" name="links[]" class="form-control" placeholder="Video / Website Link">
            </div>

            <div class="col-md-2 d-flex gap-1">
                <button type="button" class="btn btn-success add-item">+</button>
                <button type="button" class="btn btn-danger remove-item">−</button>
            </div>
        </div>
        `;

            wrapper.insertAdjacentHTML('beforeend', row);
        }

        if (e.target.classList.contains('remove-item')) {
            let row = e.target.closest('.item-row');

            if (document.querySelectorAll('.item-row').length > 1) {
                row.remove();
            }
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('change', function(e) {

        if (e.target.name === 'images[]') {
            const file = e.target.files[0];

            if (file && !file.type.startsWith('image/')) {

                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Image',
                    text: 'Please select a valid image file (jpg, png, jpeg, webp)',
                    confirmButtonText: 'OK'
                });

                e.target.value = '';
            }
        }

        if (e.target.name === 'videos[]') {
            const file = e.target.files[0];

            if (file && !file.type.startsWith('video/')) {

                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Video',
                    text: 'Please select a valid video file (mp4, mov, avi, mkv)',
                    confirmButtonText: 'OK'
                });

                e.target.value = '';
            }
        }

    });
</script>
