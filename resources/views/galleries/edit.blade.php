@extends('admin.partials.app')
@section('main-content')

<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Edit galleries</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit galleries</li>
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
                        <div class="card-title">Edit galleries</div>
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

                    <form method="POST" action="{{ route('galleries.update', $gallery->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Title -->
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{ old('title', $gallery->title) }}" placeholder="Enter gallery title" required>
                                </div>

                                <!-- Thumbnail -->
                                <div class="col-md-6">
                                    <label for="thumbnail" class="form-label">Gallery Thumbnail</label>
                                    @if($gallery->thumbnail)
                                    <div class="mb-2">
                                        <img src="{{ asset('galleries/' . $gallery->thumbnail) }}" alt="Thumbnail" width="120">
                                    </div>
                                    @endif
                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control" accept=".jpg, .jpeg, .png">
                                </div>

                               

                                <!-- Multiple Images Upload -->
                                <div class="col-md-6">
                                    <label for="images" class="form-label">Add More Images</label>
                                    <input type="file" name="images[]" id="images" class="form-control" accept=".jpg, .jpeg, .png" multiple>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer mt-3">
                            <button class="btn btn-info" type="submit">Update Gallery</button>
                            <a href="{{ route('galleries.index') }}" class="btn btn-warning">Back</a>
                        </div>
                    </form>

                    @if($gallery->images && count($gallery->images))
                <div class="col-12 mt-4">
                    <label class="form-label">Existing Images</label>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($gallery->images as $img)
                        <div style="position: relative;">
                            <img src="{{ asset('gallery_images/' . $img->image) }}" alt="Image" width="100">
                            <form action="{{ route('galleries.deleteImage', $img->id) }}" method="POST" style="position: absolute; top:0; right:0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">x</button>
                            </form>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection