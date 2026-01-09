@extends('admin.partials.app')
@section('main-content')

<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Create Conferences</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Conferences</li>
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
                        <div class="card-title">Create Conferences</div>
                    </div>

                    {{-- Display Errors --}}
                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <div style="color: red; font-size: 18px; padding: 8px;">{{ $error }}</div>
                    @endforeach
                    @endif

                    {{-- Success Message --}}
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('conferences_detail.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Select Conference -->
                                <div class="col-md-6">
                                    <label for="conference_id" class="form-label">Select Conference <span class="text-danger">*</span></label>
                                    <select name="conference_id" id="conference_id" class="form-control" required>
                                        <option value="">-- Select Conference --</option>
                                        @foreach($conferences as $conf)
                                        <option value="{{ $conf->id }}">{{ $conf->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Title -->
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{ old('title') }}" placeholder="Enter detail title" required>
                                </div>

                                <!-- Upload Multiple PDFs -->
                                <div class="col-md-12 mt-3">
                                    <label class="form-label">Upload PDF(s)</label>
                                    <input type="file" name="pdfs[]" class="form-control" multiple accept=".pdf">
                                    <small class="text-muted">You can upload multiple PDFs</small>
                                </div>

                                <!-- Video Links (Dynamic Add More) -->
                                <div class="col-md-12 mt-3">
                                    <label class="form-label">Video Links</label>

                                    <div id="videoLinksWrapper">
                                        <div class="input-group mb-2">
                                            <input type="url" name="video_links[]" class="form-control" placeholder="Enter video link">
                                            <button type="button" class="btn btn-success addLinkBtn">+</button>
                                        </div>
                                    </div>

                                    <small class="text-muted">Add multiple video links using the + button</small>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer mt-3">
                            <button class="btn btn-info" type="submit">Create Conference Detail</button>
                            <a href="{{ route('conferences.index') }}" class="btn btn-warning">Back</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const wrapper = document.getElementById('videoLinksWrapper');

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('addLinkBtn')) {
                let html = `
                    <div class="input-group mb-2">
                        <input type="url" name="video_links[]" class="form-control" placeholder="Enter video link">
                        <button type="button" class="btn btn-danger removeLinkBtn">-</button>
                    </div>
                `;
                wrapper.insertAdjacentHTML('beforeend', html);
            }

            if (e.target.classList.contains('removeLinkBtn')) {
                e.target.closest('.input-group').remove();
            }
        });
    });
</script>

@endsection