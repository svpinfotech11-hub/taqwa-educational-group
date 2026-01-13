@extends('admin.partials.app')
@section('main-content')

    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Create News</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create News</li>
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
                            <div class="card-title">Create News</div>
                        </div>

                        {{-- Display Errors --}}
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div style="color: red; font-size: 18px; padding: 8px;">{{ $error }}</div>
                            @endforeach
                        @endif

                        {{-- Success Message --}}
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <div class="row g-3">

                                    <!-- Title -->
                                    <div class="col-md-6">
                                        <label for="title" class="form-label">Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            value="{{ old('title') }}" placeholder="Enter news title" required>
                                    </div>

                                    <!-- News Date -->
                                    <div class="col-md-6">
                                        <label for="news_date" class="form-label">News Date <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="news_date" id="news_date" class="form-control"
                                            value="{{ old('news_date') }}" placeholder="yyyy-mm-dd" required>
                                    </div>

                                    <!-- Description -->
                                    <div class="col-md-12">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter news description">{{ old('description') }}</textarea>
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
                                <button class="btn btn-info" type="submit">Create News</button>
                                <a href="{{ route('news.index') }}" class="btn btn-warning">Back</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

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
