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
                <h3 class="mb-0">Create Contact Us</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Contact Us</li>
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
                <div class="card card-info card-outline mb-4 p-4">
                    <!--begin::Header-->

                    <!--end::Header-->
                    <!--begin::Form-->

                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <div style="color: red; font-size: 22px; padding: 12px;">{{ $error }}</div>
                    @endforeach
                    @endif
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                    <form method="POST" action="{{ route('contactUs-master.store') }}">
                        @csrf

                        <!-- Address -->
                        <div class="mb-3">
                            <label>Address</label>
                            <textarea name="address" class="form-control"></textarea>
                        </div>

                        <!-- Emails -->
                        <div class="mb-3">
                            <label>Emails</label>
                            <div id="email-wrapper">
                                <div class="d-flex mb-2">
                                    <input type="email" name="emails[]" class="form-control" placeholder="Email">
                                    <button type="button" class="btn btn-success add-email ms-2">+</button>
                                </div>
                            </div>
                        </div>

                        <!-- Phones -->
                        <div class="mb-3">
                            <label>Phone Numbers</label>
                            <div id="phone-wrapper">
                                <div class="d-flex mb-2">
                                    <input type="text" name="phones[]" class="form-control" placeholder="Phone Number">
                                    <button type="button" class="btn btn-success add-phone ms-2">+</button>
                                </div>
                            </div>
                        </div>

                        <!-- WhatsApp -->
                        <div class="mb-3">
                            <label>WhatsApp Number</label>
                            <input type="text" name="whatsapp_no" class="form-control">
                        </div>

                        <!-- Map Link -->
                        <div class="mb-3">
                            <label>Google Map Link</label>
                            <input type="text" name="map_link" class="form-control">
                        </div>

                        <button class="btn btn-primary">Save</button>
                        <a href="{{ route('contactUs-master.index') }}" class="btn btn-secondary">Back</a>
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
$(document).on('click', '.add-email', function () {
    $('#email-wrapper').append(`
        <div class="d-flex mb-2">
            <input type="email" name="emails[]" class="form-control" placeholder="Email">
            <button type="button" class="btn btn-danger remove ms-2">-</button>
        </div>
    `);
});

$(document).on('click', '.add-phone', function () {
    $('#phone-wrapper').append(`
        <div class="d-flex mb-2">
            <input type="text" name="phones[]" class="form-control" placeholder="Phone Number">
            <button type="button" class="btn btn-danger remove ms-2">-</button>
        </div>
    `);
});

$(document).on('click', '.remove', function () {
    $(this).parent().remove();
});
</script>

</script>
@endsection