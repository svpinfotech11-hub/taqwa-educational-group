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
                <h3 class="mb-0">All Schools Details</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Schools Details</li>
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
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="m-0"></h4>
                        <a href="{{ route('school-members.create') }}" class="btn btn-info">+ Add School Details</a>
                    </div>

                    {{-- Success Message --}}
                    @if(session()->has('success'))
                        <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif

                    {{-- Table --}}
                    <div class="">
                        <table id="myTable" class="table table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>School</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th style="width:150px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($members as $member)
                                    <tr>
                                        <td>{{ $member->id }}</td>

                                        <td>
                                            @if($member->image)
                                                <img src="{{ asset('school_members/' . $member->image) }}" alt="Profile Image"
                                                     width="60" height="60" style="object-fit: cover; border-radius: 5px;">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>

                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->title ?? '—' }}</td>
                                        <td>{{ $member->school ? $member->school->name : '—' }}</td>

                                        <td>
                                            {{ Str::limit($member->description, 60, '...') ?? '—' }}
                                        </td>

                                        <td>{{ $member->created_at ? $member->created_at->format('d M Y') : '—' }}</td>

                                        <td>
                                            <a href="{{ route('school-members.edit', $member->id) }}"
                                               class="btn btn-sm btn-primary">Edit</a>

                                            <form action="{{ route('school-members.destroy', $member->id) }}"
                                                  method="POST"
                                                  style="display:inline-block;"
                                                  onsubmit="return confirm('Are you sure you want to delete this member?');">
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
                    <!-- /.table -->
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