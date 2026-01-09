@extends('admin.partials.app')
@section('main-content')

<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Create Event</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Event</li>
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
                        <div class="card-title">Create Event</div>
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

                    <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Title -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control"
                                           value="{{ old('name') }}" placeholder="Enter news title" required>
                                </div>

                                <!-- News Date -->
                                <div class="col-md-6">
                                    <label for="event_date" class="form-label">Event Date <span class="text-danger">*</span></label>
                                    <input type="date" name="event_date" id="event_date" class="form-control"
                                           value="{{ old('event_date') }}" required>
                                </div>

                                <!-- Image -->
                                <div class="col-md-6">
                                    <label for="image" class="form-label">Event Image</label>
                                    <input type="file" name="image" id="image" class="form-control" accept=".jpg,.jpeg,.png">
                                </div>

                                <!-- Description -->
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="desc" id="description" class="form-control" rows="4"
                                              placeholder="Enter news description">{{ old('desc') }}</textarea>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer mt-3">
                            <button class="btn btn-info" type="submit">Create News</button>
                            <a href="{{ route('events.index') }}" class="btn btn-warning">Back</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection