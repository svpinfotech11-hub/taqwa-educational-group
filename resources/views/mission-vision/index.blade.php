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
                <h3 class="mb-0">All Mission & Vision</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Mission & Vision</li>
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
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                    <!-- /.card-header -->
                    <div class="">
                        <a href="{{ route('mission-vision.create') }}" class="btn btn-primary btn-sm mb-3">Add New</a>
                        <table id="myTable" class="table table-bordered table-striped align-middle">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th style="width: 5%;">ID</th>
                                    <th style="width: 10%;">Type</th>
                                    <th style="width: 15%;">Title</th>
                                    <th style="width: 30%;">Description</th>
                                    <!-- <th style="width: 25%;">Media</th> -->
                                    <th style="width: 15%;">Created At</th>
                                    <th style="width: 15%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sections as $section)
                                <tr class="text-center align-middle">
                                    <td>{{ $section->id }}</td>
                                    <td>{{ ucfirst($section->type) }}</td>
                                    <td>{{ $section->title ?? '—' }}</td>
                                    <td class="text-start">{{ Str::limit($section->description, 80) }}</td>

                                    {{-- Media Column --}}
                                    <!-- <td class="text-start">
                                        @foreach($section->media as $media)
                                        @if($media->media_type === 'image')
                                        <img src="{{ asset($media->media_path) }}" class="img-thumbnail mb-1" style="height:50px;">
                                        @elseif($media->media_type === 'video')
                                        <video width="100" height="50" controls class="mb-1">
                                            <source src="{{ asset($media->media_path) }}">
                                        </video>
                                        @elseif($media->media_type === 'youtube')
                                        <a href="{{ $media->media_path }}" target="_blank" class="d-block text-truncate" style="max-width:150px;">
                                            YouTube Link
                                        </a>
                                        @if($media->description)
                                        <small class="text-muted d-block">{{ Str::limit($media->description, 30) }}</small>
                                        @endif
                                        @endif
                                        @endforeach
                                        @if($section->media->isEmpty())
                                        <span class="text-muted">—</span>
                                        @endif
                                    </td> -->

                                    <td>{{ $section->created_at ? $section->created_at->format('d M Y') : '—' }}</td>

                                    <td>
                                        <a href="{{ route('mission-vision.edit', $section->id) }}" class="btn btn-sm btn-primary mb-1">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>

                                        <form action="{{ route('mission-vision.destroy', $section->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this record?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger mb-1">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                             
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