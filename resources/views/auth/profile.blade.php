@extends('admin.partials.app')
@section('main-content')


<!--begin::App Content Header-->
<div class="app-content-header">
  <!--begin::Container-->
  <div class="container-fluid">
    <!--begin::Row-->
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mb-0">Profile Update</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Profile Update</li>
        </ol>
      </div>
    </div>
    <!--end::Row-->
  </div>
  <!--end::Container-->
</div>
<!--end::App Content Header-->
<!--begin::App Content-->
<div class="app-content">
  <!--begin::Container-->
  <div class="container-fluid">
    <!--begin::Row-->
    <div class="row g-4">
      <!--begin::Col-->
      <div class="col-12">

      </div>
      <!--end::Col-->
      <!--begin::Col-->
      <div class="col-md-12">
        <div class="card card-primary card-outline mb-4">
          <div class="card-header">
            <div class="card-title">Profile Update</div>
          </div>

          <form action="{{ route('auth.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
              <!-- Name -->
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                  type="text"
                  name="name"
                  class="form-control"
                  id="name"
                  value="{{ old('name', auth()->user()->name) }}"
                  required />
              </div>

              <!-- Email -->
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input
                  type="email"
                  name="email"
                  class="form-control"
                  id="email"
                  value="{{ old('email', auth()->user()->email) }}"
                  required />
              </div>

              <!-- Password (optional) -->
              <div class="mb-3">
                <label for="password" class="form-label">Password (leave blank if not changing)</label>
                <input
                  type="password"
                  name="password"
                  class="form-control"
                  id="password"
                  autocomplete="new-password" />
                @error('password')
                <div class="error text-danger">{{ $message }}</div>
                @enderror
              </div>


              <!-- Profile Picture -->
              <div class="input-group mb-3">
                <input type="file" class="form-control" name="avatar" id="avatar">
                <label class="input-group-text" for="avatar">Upload</label>
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update Profile</button>
            </div>
          </form>
        </div>
      </div>


    </div>
    <!--end::Row-->
  </div>
  <!--end::Container-->
</div>
@endsection