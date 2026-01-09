@extends('admin.partials.app')
@section('main-content')

<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">{{ isset($news) ? 'Edit News' : 'Create News' }}</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ isset($news) ? 'Edit News' : 'Create News' }}</li>
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
                        <div class="card-title">{{ isset($news) ? 'Edit News' : 'Create News' }}</div>
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

                    <form method="POST"
                        action="{{ isset($news) ? route('news.update', $news->id) : route('news.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @if(isset($news))
                        @method('PUT')
                        @endif

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Title -->
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{ old('title', $news->title ?? '') }}"
                                        placeholder="Enter news title" required>
                                </div>

                                <!-- News Date -->
                                <div class="col-md-6">
                                    <label for="news_date" class="form-label">News Date <span class="text-danger">*</span></label>
                                    <input type="date" name="news_date" id="news_date" class="form-control"
                                        value="{{ old('news_date', isset($news->news_date) ? \Carbon\Carbon::parse($news->news_date)->format('Y-m-d') : '') }}"
                                        required>

                                </div>

                                <!-- Image -->
                                <div class="col-md-6">
                                    <label for="image" class="form-label">News Image</label>
                                    <input type="file" name="image" id="image" class="form-control" accept=".jpg,.jpeg,.png">

                                    @if(isset($news) && $news->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('uploads/news/' . $news->image) }}"
                                            alt="Current Image" width="120" height="80"
                                            style="object-fit: cover; border-radius: 5px;">
                                    </div>
                                    @endif
                                </div>

                                <!-- Description -->
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="4"
                                        placeholder="Enter news description">{{ old('description', $news->description ?? '') }}</textarea>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer mt-3">
                            <button class="btn btn-info" type="submit">{{ isset($news) ? 'Update News' : 'Create News' }}</button>
                            <a href="{{ route('news.index') }}" class="btn btn-warning">Back</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection