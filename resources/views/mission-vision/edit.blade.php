@extends('admin.partials.app')
@section('main-content')

<style>
    .card {
        border-radius: 10px;
    }

    .card-header {
        background: linear-gradient(135deg, #0d6efd, #0dcaf0);
        color: #fff;
    }

    label {
        font-weight: 500;
    }

    .form-control,
    .form-select {
        border-radius: 8px;
    }

    .section-box {
        border: 1px dashed #dee2e6;
        border-radius: 10px;
        padding: 20px;
        background: #f9fafb;
        margin-bottom: 25px;
    }

    .media-card {
        position: relative;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, .08);
    }

    .media-card button {
        position: absolute;
        bottom: 10px;
        left: 10px;
        right: 10px;
    }

    .media-card {
        position: relative;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, .08);
        height: 150px;
        width: 100%;
    }

    .media-card img {
        width: 100%;
        height: 150px;
    }

    .media-card img {
        width: 100%;
    }

    video.w-100 {
        height: 150px;
    }
</style>

<div class="app-content">
    <div class="container-fluid">
        <div class="card card-info card-outline mt-4">

            <div class="card-header">
                <h5 class="card-title">Update Mission / Vision / Objective</h5>
            </div>

            <form method="POST" action="{{ route('mission-vision.update',$section->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">

                    {{-- SECTION INFO --}}
                    <div class="section-box">
                        <h5 class="text-primary mb-3">📌 Section Information</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label>Section Type *</label>
                                <select name="type" class="form-select" required>
                                    <option value="">Select</option>
                                    <option value="mission" {{ old('type',$section->type)=='mission'?'selected':'' }}>Mission</option>
                                    <option value="vision" {{ old('type',$section->type)=='vision'?'selected':'' }}>Vision</option>
                                    <option value="objective" {{ old('type',$section->type)=='objective'?'selected':'' }}>Objective</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control"
                                    value="{{ old('title',$section->title) }}">
                            </div>

                            <div class="col-md-12">
                                <label>Description *</label>
                                <textarea name="description" class="form-control summernote" rows="5">{{ old('description',$section->description) }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- IMAGES --}}
                    <div class="section-box">
                        <h5 class="text-success mb-3">🖼 Images</h5>

                        <div class="row" id="image-wrapper">
                            <div class="col-md-4 mb-3 image-item">
                                <input type="file" name="images[]" class="form-control">
                            </div>
                        </div>

                        <button type="button" id="add-image" class="btn btn-outline-success btn-sm">
                            + Add Image
                        </button>
                        <button type="button" id="reset-image" class="btn btn-outline-secondary btn-sm ms-2">
                            🔄 Reset
                        </button>
                    </div>

                    {{-- VIDEOS --}}
                    <div class="section-box">
                        <h5 class="text-warning mb-3">🎬 Videos</h5>

                        <div class="row" id="video-wrapper">
                            <div class="col-md-4 mb-3 video-item">
                                <input type="file" name="videos[]" class="form-control">
                            </div>
                        </div>

                        <button type="button" id="add-video" class="btn btn-outline-warning btn-sm">
                            + Add Video
                        </button>
                        <button type="button" id="reset-video" class="btn btn-outline-secondary btn-sm ms-2">
                            🔄 Reset
                        </button>
                    </div>

                    {{-- YOUTUBE --}}
                    <div class="section-box">
                        <h5 class="text-danger mb-3">▶️ YouTube Links</h5>

                        <div id="youtube-wrapper">
                            <div class="row mb-2 youtube-item">
                                <div class="col-md-5">
                                    <input type="url" name="youtube_links[]" class="form-control" placeholder="YouTube URL">
                                </div>
                                <div class="col-md-5">
                                    <input type="text" name="youtube_descriptions[]" class="form-control" placeholder="Description">
                                </div>
                            </div>
                        </div>

                        <button type="button" id="add-youtube" class="btn btn-outline-danger btn-sm">
                            + Add Link
                        </button>
                        <button type="button" id="reset-youtube" class="btn btn-outline-secondary btn-sm ms-2">
                            🔄 Reset
                        </button>
                    </div>

                    {{-- EXISTING MEDIA --}}
                    <div class="section-box">
                        <h5>📂 Existing Media</h5>
                        <div class="row">
                            @foreach($section->media as $media)
                            <div class="col-md-3 mb-3">
                                <div class="media-card">
                                    @if($media->media_type=='image')
                                    <img src="{{ asset($media->media_path) }}" class="img-fluid">
                                    @elseif($media->media_type=='video')
                                    <video controls class="w-100">
                                        <source src="{{ asset($media->media_path) }}">
                                    </video>
                                    @else
                                    <iframe class="w-100" height="150"
                                        src="https://www.youtube.com/embed/{{ Str::after($media->media_path,'v=') }}">
                                    </iframe>
                                    @endif

                                    <button type="button"
                                        class="btn btn-danger btn-sm delete-media"
                                        data-id="{{ $media->id }}">
                                        Remove
                                    </button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                <div class="card-footer text-end">
                    <button class="btn btn-primary px-4">💾 Update</button>
                    <a href="{{ route('mission-vision.index') }}" class="btn btn-secondary px-4">⬅ Back</a>
                </div>

            </form>
        </div>
    </div>
</div>

{{-- JS --}}
<script>
    /* ADD */
    document.getElementById('add-image').onclick = () => {
        document.getElementById('image-wrapper').insertAdjacentHTML(
            'beforeend',
            `<div class="col-md-4 mb-3 image-item">
            <input type="file" name="images[]" class="form-control">
        </div>`
        );
    };

    document.getElementById('add-video').onclick = () => {
        document.getElementById('video-wrapper').insertAdjacentHTML(
            'beforeend',
            `<div class="col-md-4 mb-3 video-item">
            <input type="file" name="videos[]" class="form-control">
        </div>`
        );
    };

    document.getElementById('add-youtube').onclick = () => {
        document.getElementById('youtube-wrapper').insertAdjacentHTML(
            'beforeend',
            `<div class="row mb-2 youtube-item">
            <div class="col-md-5">
                <input type="url" name="youtube_links[]" class="form-control">
            </div>
            <div class="col-md-5">
                <input type="text" name="youtube_descriptions[]" class="form-control">
            </div>
        </div>`
        );
    };

    /* RESET PER SECTION */
    document.getElementById('reset-image').onclick = () => {
        document.querySelectorAll('.image-item:not(:first-child)').forEach(el => el.remove());
    };

    document.getElementById('reset-video').onclick = () => {
        document.querySelectorAll('.video-item:not(:first-child)').forEach(el => el.remove());
    };

    document.getElementById('reset-youtube').onclick = () => {
        document.querySelectorAll('.youtube-item:not(:first-child)').forEach(el => el.remove());
    };

    /* DELETE EXISTING MEDIA */
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('delete-media')) {
            if (confirm('Delete this media?')) {
                fetch(`/mission-vision/media/${e.target.dataset.id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            e.target.closest('.col-md-3').remove();
                            alert(data.message); // ✅ INSTANT FEEDBACK
                        }
                    });
            }
        }
    });
</script>

@endsection