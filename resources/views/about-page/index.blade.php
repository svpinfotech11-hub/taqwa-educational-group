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
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                    <!-- /.card-header -->
                    <div class="">
                        <table id="myTable" class="table table-bordered table-striped align-middle">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th style="width: 5%;">ID</th>
                                    <th style="width: 25%;">Name</th>
                                    <th style="width: 20%;">Image</th>
                                    <th style="width: 20%;">Created At</th>
                                    <th style="width: 30%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($abouts as $about)
                                <tr>
                                    <td class="text-center">{{ $about->id }}</td>
                                    <td>{{ $about->name }}</td>

                                    <td class="text-center">
                                        @if($about->image)
                                        <img src="{{ asset('about/' . $about->image) }}"
                                            alt="About Image"
                                            width="80" height="50"
                                            style="object-fit: cover; border-radius: 5px;">
                                        @else
                                        <span class="text-muted">No Image</span>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        {{ $about->created_at ? $about->created_at->format('d M Y') : '—' }}
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('about-page.edit', $about->id) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>

                                        <form action="{{ route('about-page.destroy', $about->id) }}"
                                            method="POST"
                                            style="display:inline-block;"
                                            onsubmit="return confirm('Are you sure you want to delete this record?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
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