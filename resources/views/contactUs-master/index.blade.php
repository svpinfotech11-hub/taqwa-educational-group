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
                <h3 class="mb-0">All Contact Record</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Contact Record</li>
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
                        <!-- <h3 class="">All Category</h3> -->
                    </div>
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif

                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <div style="color: red; font-size: 22px; padding: 12px;">{{ $error }}</div>
                    @endforeach
                    @endif
                   
                    <!-- /.card-header -->
                    <div class="">
                        <table id="myTable" class="table table-bordered table-striped align-middle">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="20%">Address</th>
                                    <th width="15%">Emails</th>
                                    <th width="15%">Phones</th>
                                    <th width="10%">WhatsApp</th>
                                    <th width="15%">Map</th>
                                    <th width="10%">Created</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($contacts as $contact)
                                <tr>
                                    <td class="text-center">{{ $contact->id }}</td>

                                    <td>{{ $contact->address ?? '—' }}</td>

                                    <!-- Emails -->
                                    <td>
                                        @if($contact->emails)
                                        <ul class="mb-0">
                                            @foreach($contact->emails as $email)
                                            <li>{{ $email }}</li>
                                            @endforeach
                                        </ul>
                                        @else
                                        —
                                        @endif
                                    </td>

                                    <!-- Phones -->
                                    <td>
                                        @if($contact->phones)
                                        <ul class="mb-0">
                                            @foreach($contact->phones as $phone)
                                            <li>{{ $phone }}</li>
                                            @endforeach
                                        </ul>
                                        @else
                                        —
                                        @endif
                                    </td>

                                    <td class="text-center">{{ $contact->whatsapp_no ?? '—' }}</td>

                                    <td class="text-center">
                                        @if($contact->map_link)
                                        <a href="{{ $contact->map_link }}" target="_blank" class="btn btn-sm btn-info">
                                            View Map
                                        </a>
                                        @else
                                        —
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        {{ $contact->created_at->format('d M Y') }}
                                    </td>

                                    <!-- Actions -->
                                    <td class="text-center">
                                        <a href="{{ route('contactUs-master.edit', $contact->id) }}" class="btn btn-sm btn-primary">
                                            Edit
                                        </a>

                                        <form action="{{ route('contactUs-master.destroy', $contact->id) }}"
                                            method="POST"
                                            style="display:inline-block;"
                                            onsubmit="return confirm('Delete this record?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Delete</button>
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