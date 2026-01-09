@extends('admin.partials.app')
@section('main-content')

<style>
    .table> :not(caption)>*>* {
        padding: 20px;
    }

    @media screen and (max-width: 767px) {
        div.dt-container div.dt-layout-row:not(.dt-layout-table) {
            display: flex;
        }
    }
</style>

<!--begin::App Content Header-->
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">All Schools</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Schools</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--end::App Content Header-->

<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-md-12">
                <div class="mb-4">
                    <div class="">
                        <!-- <h3 class="">All Users</h3> -->
                    </div>
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="m-0">School List</h4>
                        <a href="{{ route('schools-master.create') }}" class="btn btn-info">+ Add New School</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="">
                        <table id="myTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Thumbnail</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($schools as $school)
                                <tr>
                                    <td>{{ $school->id }}</td>
                                    <td>{{ $school->name }}</td>
                                    <td>{{ $school->code ?? '—' }}</td>
                                    <td>{{ $school->city ?? '—' }}</td>
                                    <td>{{ $school->state ?? '—' }}</td>
                                    <td>{{ $school->phone ?? '—' }}</td>

                                    <td>
                                        @if($school->status == 1)
                                        <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if($school->thumbnail)
                                        <img src="{{ asset('schools/' . $school->thumbnail) }}" alt="School Image"
                                            width="80" height="50" style="object-fit: cover; border-radius: 5px;">
                                        @else
                                        <span class="text-muted">No Image</span>
                                        @endif
                                    </td>

                                    <td>{{ $school->created_at ? $school->created_at->format('d M Y') : '—' }}</td>

                                    <td>
                                        <a href="{{ route('schools-master.edit', $school->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                        <form action="{{ route('schools-master.destroy', $school->id) }}" method="POST"
                                            style="display:inline-block;"
                                            onsubmit="return confirm('Are you sure you want to delete this school?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center text-muted">No schools found</td>
                                </tr>
                                @endforelse
                    </div>

                </div>

                <!-- /.card -->
            </div>

            <!-- /.col -->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>

@endsection