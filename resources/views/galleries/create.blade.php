@extends('admin.partials.app')
@section('main-content')

<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Create galleries</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create galleries</li>
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
                        <div class="card-title">Create galleries</div>
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

                    <form method="POST" action="{{ route('galleries.store.submit') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Title -->
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="" placeholder="Enter gallery title" required>
                                </div>

                                <!-- Thumbnail -->
                                <div class="col-md-6">
                                    <label for="thumbnail" class="form-label">Gallery Thumbnail</label>
                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control" accept=".jpg, .jpeg, .png">
                                </div>

                                <!-- Multiple Images -->
                                <div class="col-md-6">
                                    <label for="images" class="form-label">Multiple Images</label>
                                    <input type="file" name="images[]" id="images" class="form-control" accept=".jpg, .jpeg, .png" multiple>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer mt-3">
                            <button class="btn btn-info" type="submit">Create Gallery</button>
                            <a href="{{ route('galleries.index') }}" class="btn btn-warning">Back</a>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection