@extends('admin.partials.app')
@section('main-content')

<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Update Video galleries</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Video galleries</li>
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
                        <div class="card-title">Update Video galleries</div>
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

                    <form method="POST" action="{{ route('video-gallery.update', $video->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Title -->
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{ $video->title }}" placeholder="Enter Video  title" required>
                                </div>

                                <!-- Thumbnail -->
                                <div class="col-md-6">
                                    <label for="video_link" class="form-label">Video Link</label>
                                    <input type="text" name="video_link" id="video_link"  value="{{ $video->video_link }}"class="form-control" accept=".jpg, .jpeg, .png">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer mt-3">
                            <button class="btn btn-info" type="submit">Create Video Gallery</button>
                            <a href="{{ route('video-gallery.index') }}" class="btn btn-warning">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection