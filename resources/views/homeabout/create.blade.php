@extends('admin.partials.app')
@section('main-content')

<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Home About Page</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Home About Page</li>
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
                        <div class="card-title">Create Home About</div>
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

                    <form method="POST" action="{{ route('homeabout.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Title -->
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{ old('title') }}" placeholder="Enter title" required>
                                </div>

                                <!-- Description -->
                                <div class="col-md-12 mt-3">
                                    <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                    <textarea name="description" id="description" class="form-control" rows="6">{{ old('description') }}</textarea>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer mt-3">
                            <button class="btn btn-info" type="submit">Create Home About</button>
                            <a href="{{ route('homeabout.index') }}" class="btn btn-warning">Back</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>




@endsection
