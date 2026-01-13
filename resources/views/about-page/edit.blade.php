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
                    <h3 class="mb-0">Update About</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update About</li>
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
                            <div class="card-title">Update About</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div style="color: red; font-size: 22px; padding: 12px;">{{ $error }}</div>
                            @endforeach
                        @endif

                        <form method="POST" action="{{ route('about-page.update', ['about' => $about->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

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
                                            value="{{ old('name', $about->name) }}" required>
                                    </div>

                                    <!-- Description (Optional) -->
                                    <div class="col-md-12">
                                        <label for="description" class="form-label">Description (optional)</label>
                                        <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $about->description) }}</textarea>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label fw-bold">Media Details</label>

                                        <div id="item-wrapper">

                                            @forelse($about->details as $detail)
                                                <div class="row g-2 mb-3 item-row">
                                                    <input type="hidden" name="detail_ids[]" value="{{ $detail->id }}">

                                                    <!-- Image -->
                                                    <div class="col-md-3">
                                                        <label class="form-label">Image</label>
                                                        <input type="file" name="images[]" class="form-control"
                                                            accept=".jpg,.jpeg,.png,.webp,image/*">

                                                        @if ($detail->image)
                                                            <img src="{{ asset('about/images/' . $detail->image) }}"
                                                                class="img-thumbnail mt-1" width="120">
                                                        @endif
                                                    </div>

                                                    <!-- Video -->
                                                    <div class="col-md-3">
                                                        <label class="form-label">Video</label>
                                                        <input type="file" name="videos[]" class="form-control"
                                                            accept=".mp4,.mov,.avi,.mkv,video/*">

                                                        @if ($detail->video)
                                                            <a href="{{ asset('about/videos/' . $detail->video) }}"
                                                                target="_blank" class="btn btn-outline-primary btn-sm mt-1">
                                                                ▶ Play Video
                                                            </a>
                                                        @endif

                                                    </div>
                                                    <!-- Link -->
                                                    <div class="col-md-4">
                                                        <label class="form-label">Link</label>
                                                        <input type="url" name="links[]" class="form-control"
                                                            placeholder="https://example.com"
                                                            value="{{ old($about->link ?? '') }}">

                                                        @if (!empty($detail->link))
                                                            <a href="{{ $detail->link }}" target="_blank"
                                                                class="btn btn-outline-info btn-sm mt-1">
                                                                🔗 Open Link
                                                            </a>
                                                        @endif
                                                    </div>
                                                    <!-- Buttons -->
                                                    <div class="col-md-2 d-flex align-items-start gap-1">
                                                        <button type="button"
                                                            class="btn btn-success btn-sm px-2 py-1 add-item"
                                                            title="Add">
                                                            +
                                                        </button>

                                                        <button type="button"
                                                            class="btn btn-danger btn-sm px-2 py-1 remove-item"
                                                            title="Remove">
                                                            −
                                                        </button>
                                                    </div>


                                                </div>
                                            @empty
                                                <!-- If no data exists -->
                                                <div class="row g-2 mb-3 item-row">
                                                    <div class="col-md-3">
                                                        <input type="file" name="images[]" class="form-control">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="file" name="videos[]" class="form-control">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" name="links[]" class="form-control">
                                                    </div>
                                                    <div class="col-md-2 d-flex gap-1">
                                                        <button type="button" class="btn btn-success add-item">+</button>
                                                        <button type="button"
                                                            class="btn btn-danger remove-item">−</button>
                                                    </div>
                                                </div>
                                            @endforelse

                                        </div>

                                    </div>

                                </div>

                                <div class="card-footer mt-3">
                                    <button class="btn btn-success" type="submit">Update Banner</button>
                                    <a href="{{ route('about-page.index') }}" class="btn btn-warning">Back</a>
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

            <!-- Image -->
            <div class="col-md-3">
                <label class="form-label">Image</label>
                <input type="file" name="images[]" class="form-control"
                    accept=".jpg,.jpeg,.png,.webp,image/*">
            </div>

            <!-- Video -->
            <div class="col-md-3">
                <label class="form-label">Video</label>
                <input type="file" name="videos[]" class="form-control"
                    accept=".mp4,.mov,.avi,.mkv,video/*">
            </div>

            <!-- Link -->
            <div class="col-md-4">
                <label class="form-label">Link</label>
                <input type="text" name="links[]" class="form-control"
                    placeholder="https://example.com">
            </div>

            <!-- Buttons -->
            <div class="col-md-2 d-flex align-items-end gap-1">
                <button type="button"
                    class="btn btn-success btn-sm px-2 py-1 add-item">+</button>

                <button type="button"
                    class="btn btn-danger btn-sm px-2 py-1 remove-item">−</button>
            </div>

        </div>`;

            wrapper.insertAdjacentHTML('beforeend', row);
        }

        if (e.target.classList.contains('remove-item')) {
            const rows = document.querySelectorAll('.item-row');
            if (rows.length > 1) {
                e.target.closest('.item-row').remove();
            }
        }
    });
</script>
