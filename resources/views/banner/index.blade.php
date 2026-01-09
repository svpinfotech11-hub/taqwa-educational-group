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
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">All Banner</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Banner</li>
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
        <div class="row">
            <div class="col-md-12">
                <div class="mb-4">
                    <div class="">
                        <!-- <h3 class="">All Banner</h3> -->
                    </div>
                    <!-- /.card-header -->
                    <div class="">
                        <table id="myTable" class="table table-bordered table-striped align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <!-- <th>Description</th> -->
                                    <th>Image</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($banners as $banner)
                                <tr>
                                    <td>{{ $banner->id }}</td>
                                    <td>{{ $banner->title }}</td>
                                    <!-- <td>{{ Str::limit($banner->description, 50) }}</td> -->
                                    <!-- Image Preview -->
                                    <td>
                                        @if($banner->image)
                                        <img src="{{ asset('banners/'. $banner->image) }}" alt="Banner Image" width="80" height="50" style="object-fit: cover; border-radius: 5px;">
                                        @else
                                        <span class="text-muted">No Image</span>
                                        @endif
                                    </td>

                                    <td>{{ $banner->created_at->format('d M Y') }}</td>

                                    <!-- Action Buttons -->
                                    <td>
                                        <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                        <form action="{{ route('banner.destroy', $banner->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this banner?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">No banners found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

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
<!--end::App Content-->

@endsection