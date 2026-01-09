@extends('admin.partials.app')
@section('main-content')


<style>
    /* .form-control {
        font-size: 24px;
    }

    button.btn.btn-info {
        font-size: 26px;
    } */
</style>

<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Update ChairmanMessage</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update ChairmanMessage</li>
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
        <div class="row g-4">
            <!--begin::Col-->

            <!--end::Col-->

            <!--begin::Col-->
            <div class="col-md-12">

                <!--end::Different Width-->
                <!--begin::Form Validation-->
                <div class="card card-info card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Update ChairmanMessage</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->

                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <div style="color: red; font-size: 22px; padding: 12px;">{{ $error }}</div>
                    @endforeach
                    @endif

                    <form method="POST" action="{{ route('chairman-messages.update',  $message->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                        @endif

                        <!-- <div class="card-body">
                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label for="title" class="form-label">Name<span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        name="title"
                                        id="title"
                                        class="form-control"
                                        value="{{ old('name', $message->title) }}"
                                        required>
                                </div>

                                <div class="col-md-6">
                                    <label for="image" class="form-label">Image (optional)</label>
                                    <input
                                        type="file"
                                        name="image"
                                        id="image"
                                        class="form-control"
                                        accept=".jpg, .jpeg, .png">

                                    @if($message->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('chairman_images/' .$message->image) }}" alt="Current Banner" width="120" class="rounded border">
                                        <p class="text-muted small mt-1 mb-0">Current Image</p>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description (optional)</label>
                                    <textarea
                                        name="description"
                                        id="description"
                                        class="form-control"
                                        rows="4">{{ old('description', $message->description) }}</textarea>
                                </div>

                            </div>
                        </div> -->


                        <div class="card-body">
                        <div class="row g-3">

                            <!-- Title -->
                            <div class="col-md-6">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control"
                                    value="{{ old('title', $message->title) }}" required>
                            </div>

                            <!-- Multiple Image + Description -->
                            <div class="col-md-12">
                                <label class="form-label">Images & Descriptions</label>

                                <div id="item-wrapper">
                                    @foreach($message->items as $item)
<div class="row g-2 mb-3 item-row">
    <input type="hidden" name="item_ids[]" value="{{ $item->id }}">

    <div class="col-md-4">
        <input type="file" name="images[]" class="form-control">
        @if($item->image)
            <img src="{{ asset('chairman_images/'.$item->image) }}"
                 width="100" class="mt-1 border rounded">
        @endif
    </div>

    <div class="col-md-6">
        <textarea name="descriptions[]" class="form-control" rows="2">
            {{ $item->description }}
        </textarea>
    </div>

    <div class="col-md-2">
        <button type="button" class="btn btn-danger remove-item">Remove</button>
    </div>
</div>
@endforeach

                                </div>

                                <button type="button" class="btn btn-success mt-2 add-item">Add More</button>
                            </div>

                        </div>
                    </div>


                        <div class="card-footer mt-3">
                            <button class="btn btn-success" type="submit">Update Banner</button>
                            <a href="{{ route('chairman-messages.index') }}" class="btn btn-warning">Back</a>
                        </div>
                    </form>



                    <!--end::JavaScript-->
                </div>
                <!--end::Form Validation-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::App Content-->


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    
$(document).on('click', '.add-item', function () {
    $('#item-wrapper').append(`
        <div class="row g-2 mb-3 item-row">
        <input type="hidden" name="item_ids[]" value="">

            <div class="col-md-4">
                <input type="file" name="images[]" class="form-control">
            </div>
            <div class="col-md-6">
                <textarea name="descriptions[]" class="form-control" rows="2"></textarea>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-item">Remove</button>
            </div>
        </div>
    `);
});

$(document).on('click', '.remove-item', function () {
    $(this).closest('.item-row').remove();
});
</script>


@endsection