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
                <h3 class="mb-0">Home Abouot Page Content</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Home Abouot Page Content</li>
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

                    <a href="{{ route('homeabout.create') }}" class="btn btn-info">Add New</a>
                    <table id="myTable" class="table table-bordered table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($homeabouts as $homeabout)
                            <tr>
                                <td>{{ $homeabout->id }}</td>
                                <td>{{ $homeabout->title }}</td>
                                <td>
                                    {{-- Edit button --}}
                                    <a href="{{ route('homeabout.edit', $homeabout->id) }}" class="btn btn-sm btn-info">Edit</a>

                                    {{-- Delete button --}}
                                    <form action="{{ route('homeabout.destroy', $homeabout->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this entry?');">
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