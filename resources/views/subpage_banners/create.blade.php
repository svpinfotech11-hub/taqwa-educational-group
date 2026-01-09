@extends('admin.partials.app')
@section('main-content')

<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Create Sub Page Banner</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Sub Page Banner</li>
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
                        <div class="card-title">Create Sub Page Banner</div>
                    </div>

                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <div style="color: red; font-size: 22px; padding: 12px;">{{ $error }}</div>
                    @endforeach
                    @endif

                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('subpage_banners.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row g-3">

                                <!-- School Name -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Banner Name <span class="text-danger">*</span></label>
                                    <input type="text" name="title" id="name" class="form-control" value="{{ old('name') }}" required>
                                </div>

                                <!-- Thumbnail -->
                                <div class="col-md-6">
                                    <label for="image" class="form-label">Thumbnail Image</label>
                                    <input type="file" name="image" id="image" class="form-control" accept=".jpg, .jpeg, .png">
                                </div>

                            </div>
                        </div>

                        <div class="card-footer mt-3">
                            <button class="btn btn-info" type="submit">Submit</button>
                            <a href="{{ route('subpage_banners.index') }}" class="btn btn-warning">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection