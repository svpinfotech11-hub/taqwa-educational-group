@extends('admin.partials.app')
@section('main-content')

<!--begin::App Content Header-->
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Create Course</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Course</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!--begin::App Content-->
<div class="app-content">
    <div class="container-fluid">
        <div class="row g-4">
            <div class="col-md-12">
                <div class="card card-info card-outline mb-4">
                    <div class="card-header">
                        <div class="card-title">Create Course</div>
                    </div>

                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <div style="color: red; font-size: 18px; padding: 8px;">{{ $error }}</div>
                        @endforeach
                    @endif

                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <form class="needs-validation" method="POST" action="{{ route('courses-master.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Category -->
                                <div class="col-md-6">
                                    <label for="category_id" class="form-label">Course Category <span class="text-danger">*</span></label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        <option value="">-- Select Category --</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Course Name -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Course Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                                </div>

                                <!-- Course Code -->
                                <div class="col-md-6">
                                    <label for="code" class="form-label">Course Code</label>
                                    <input type="text" name="code" id="code" class="form-control" value="{{ old('code') }}">
                                </div>

                                <!-- Duration -->
                                <div class="col-md-6">
                                    <label for="duration" class="form-label">Duration (e.g. 6 weeks)</label>
                                    <input type="text" name="duration" id="duration" class="form-control" value="{{ old('duration') }}">
                                </div>

                                <!-- Start Date -->
                                <div class="col-md-6">
                                    <label for="start_date" class="form-label">Start Date</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}">
                                </div>

                                <!-- End Date -->
                                <div class="col-md-6">
                                    <label for="end_date" class="form-label">End Date</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}">
                                </div>

                                <!-- Fee -->
                                <div class="col-md-6">
                                    <label for="fee" class="form-label">Course Fee ($)</label>
                                    <input type="number" name="fee" id="fee" step="0.01" class="form-control" value="{{ old('fee') }}">
                                </div>

                                <!-- Discount -->
                                <div class="col-md-6">
                                    <label for="discount" class="form-label">Discount (%)</label>
                                    <input type="number" name="discount" id="discount" step="0.01" class="form-control" value="{{ old('discount') }}">
                                </div>

                                <!-- Course Status -->
                                <div class="col-md-6">
                                    <label for="course_status" class="form-label">Course Status</label>
                                    <select name="course_status" id="course_status" class="form-control">
                                        <option value="active" {{ old('course_status') == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ old('course_status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                                <!-- Mode -->
                                <div class="col-md-6">
                                    <label for="mode" class="form-label">Mode</label>
                                    <select name="mode" id="mode" class="form-control">
                                        <option value="online" {{ old('mode') == 'online' ? 'selected' : '' }}>Online</option>
                                        <option value="offline" {{ old('mode') == 'offline' ? 'selected' : '' }}>Offline</option>
                                        <option value="hybrid" {{ old('mode') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                                    </select>
                                </div>

                                <!-- Thumbnail -->
                                <div class="col-md-6">
                                    <label for="thumbnail_url" class="form-label">Course Thumbnail</label>
                                    <input type="file" name="thumbnail_url" id="thumbnail_url" class="form-control" accept=".jpg, .jpeg, .png">
                                </div>

                                <!-- Description -->
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer mt-3">
                            <button class="btn btn-info" type="submit">Create Course</button>
                            <a href="{{ route('courses-master.index') }}" class="btn btn-warning">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
