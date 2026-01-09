@extends('admin.partials.app')
@section('main-content')

<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Create School</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create School</li>
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
                        <div class="card-title">Create School</div>
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

                    <form method="POST" action="{{ route('schools-master.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row g-3">

                                <!-- School Name -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label">School Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                                </div>

                                <!-- Slug -->
                                <!-- <div class="col-md-6">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}">
                                </div> -->

                                <!-- Code -->
                                <div class="col-md-6">
                                    <label for="code" class="form-label">School Code</label>
                                    <input type="text" name="code" id="code" class="form-control" value="{{ old('code') }}">
                                </div>

                                <!-- Address -->
                                <div class="col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
                                </div>

                                <!-- City -->
                                <div class="col-md-4">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}">
                                </div>

                                <!-- State -->
                                <div class="col-md-4">
                                    <label for="state" class="form-label">State</label>
                                    <input type="text" name="state" id="state" class="form-control" value="{{ old('state') }}">
                                </div>

                                <!-- Phone -->
                                <div class="col-md-4">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                                </div>

                                <!-- Website -->
                                <div class="col-md-6">
                                    <label for="website" class="form-label">Website</label>
                                    <input type="text" name="website" id="website" class="form-control" value="{{ old('website') }}">
                                </div>

                                <!-- Thumbnail -->
                                <div class="col-md-6">
                                    <label for="thumbnail" class="form-label">Thumbnail Image</label>
                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control" accept=".jpg, .jpeg, .png">
                                </div>

                                <!-- Description -->
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer mt-3">
                            <button class="btn btn-info" type="submit">Create School</button>
                            <a href="{{ route('schools-master.index') }}" class="btn btn-warning">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
