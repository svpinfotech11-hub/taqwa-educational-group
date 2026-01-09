@extends('admin.partials.app')
@section('main-content')

<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Edit School Details</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit School Details</li>
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
                        <div class="card-title">Edit School Details</div>
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

                    <form method="POST" action="{{ route('school-members.update', $record->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- School -->
                                <div class="col-md-6">
                                    <label for="school_id" class="form-label">School <span class="text-danger">*</span></label>
                                    <select name="school_id" id="school_id" class="form-control" required>
                                        <option value="">-- Select School --</option>
                                        @foreach($schools as $school)
                                        <option value="{{ $school->id }}" {{ $school->id == $record->school_id ? 'selected' : '' }}>
                                            {{ $school->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Name -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Member Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ old('name', $record->name) }}" required>
                                </div>

                                <!-- Title -->
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Title / Position</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{ old('title', $record->title) }}">
                                </div>

                                <!-- Current Image -->
                                <div class="col-md-6">
                                    <label class="form-label">Current Image</label><br>
                                    @if($record->image)
                                    <img src="{{ asset('school_members/' . $record->image) }}" alt="Profile Image"
                                        width="120" class="img-thumbnail mb-2">
                                    @else
                                    <p>No image uploaded.</p>
                                    @endif
                                    <input type="file" name="image" id="image" class="form-control" accept=".jpg, .jpeg, .png">
                                </div>

                                <!-- Description -->
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $record->description) }}</textarea>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer mt-3">
                            <button class="btn btn-info" type="submit">Update Member</button>
                            <a href="{{ route('school-members.index') }}" class="btn btn-warning">Back</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection