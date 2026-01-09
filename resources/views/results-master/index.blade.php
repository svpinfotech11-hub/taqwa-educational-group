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
                <h3 class="mb-0">All Result</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Result</li>
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
                                <th>Title</th>
                                <th>Description</th>
                                <th>Pdf</th>
                                <th>Result Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($results as $r)
                            <tr>
                                <td>{{ $r->id }}</td>
                                <td>{{ $r->title }}</td>
                                <td>{{ $r->description }}</td>
                                <td>
                                    @if($r->pdf_path)
                                    <a href="{{ asset('results/'.$r->pdf_path) }}"
                                        target="_blank"
                                        class="btn btn-sm btn-primary">
                                        View PDF
                                    </a>
                                    @else
                                    <span class="text-muted">No PDF</span>
                                    @endif
                                </td>

                                <td>{{ \Carbon\Carbon::parse($r->news_date)->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('results-master.edit', $r->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('results-master.destroy', $r->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this news?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">No news found</td>
                            </tr>
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