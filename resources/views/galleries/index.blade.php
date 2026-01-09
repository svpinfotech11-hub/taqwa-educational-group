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
                <h3 class="mb-0">All Gallery</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Gallery</li>
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
                        <a href="{{ route('galleries.create') }}" class="btn btn-info">+ Add School Details</a>
                    </div>

                    {{-- Success Message --}}
                    @if(session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif

                    {{-- Table --}}
                    <div class="">
                        <table id="galleryTable" class="table table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Thumbnail</th>
                                    <th>Title</th>
                                    <th>Images Count</th>
                                    <th>Created At</th>
                                    <th style="width:150px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($galleries as $gallery)
                                <tr>
                                    <td>{{ $gallery->id }}</td>

                                    <!-- Thumbnail -->
                                    <td>
                                        @if($gallery->thumbnail)
                                        <img src="{{ asset('galleries/' . $gallery->thumbnail) }}"
                                            alt="Thumbnail" width="60" height="60"
                                            style="object-fit: cover; border-radius: 5px;">
                                        @else
                                        <span class="text-muted">No Thumbnail</span>
                                        @endif
                                    </td>

                                    <td>{{ $gallery->title }}</td>

                                    <!-- Images Count -->
                                    <td>{{ $gallery->images ? count($gallery->images) : 0 }}</td>

                                    <td>{{ $gallery->created_at ? $gallery->created_at->format('d M Y') : '—' }}</td>

                                    <td>
                                        <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('galleries.destroy', $gallery->id) }}"
                                            method="POST"
                                            style="display:inline-block;"
                                            onsubmit="return confirm('Are you sure you want to delete this gallery?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">No galleries found.</td>
                                </tr>
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