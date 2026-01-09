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
                <h3 class="mb-0">All Courses</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Courses</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--end::App Content Header-->

<!--begin::App Content-->
<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-4">

                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <table id="myTable" class="table table-bordered table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Fee</th>
                                <th>Status</th>
                                <th>Mode</th>
                                <th>Thumbnail</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($courses as $course)
                            <tr>
                                <td>{{ $course->id }}</td>
                                <td>{{ $course->category->name ?? 'N/A' }}</td>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->code }}</td>
                                <td>${{ number_format($course->fee, 2) }}</td>
                                <td>
                                    @if($course->course_status == 'active')
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ ucfirst($course->mode) }}</td>

                                <!-- Thumbnail -->
                                <td>
                                    @if($course->thumbnail_url)
                                        <img src="{{ asset('courses/' . $course->thumbnail_url) }}" alt="Thumbnail" width="80" height="50" style="object-fit: cover; border-radius: 5px;">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>

                                <td>{{ $course->created_at->format('d M Y') }}</td>

                                <!-- Action Buttons -->
                                <td>
                                    <a href="{{ route('courses-master.edit', $course->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                    <form action="{{ route('courses-master.destroy', $course->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this course?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>

                            </tr>
                            @empty
                            
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<!--end::App Content-->

@endsection
