@extends('admin.partials.app')
@section('main-content')

<div class="app-content">
    <div class="container-fluid">
        <div class="card card-info card-outline p-4">

            <h3>Edit Contact Us</h3>

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

            <form method="POST" action="{{ route('contactUs-master.update', $contact->id) }}">
                @csrf
                @method('PUT')

                <!-- Address -->
                <div class="mb-3">
                    <label>Address</label>
                    <textarea name="address" class="form-control">{{ old('address', $contact->address) }}</textarea>
                </div>

                <!-- Emails -->
                <div class="mb-3">
                    <label>Emails</label>
                    <div id="email-wrapper">
                        @forelse ($contact->emails ?? [] as $email)
                            <div class="d-flex mb-2">
                                <input type="email" name="emails[]" class="form-control" value="{{ $email }}">
                                <button type="button" class="btn btn-danger remove ms-2">-</button>
                            </div>
                        @empty
                            <div class="d-flex mb-2">
                                <input type="email" name="emails[]" class="form-control">
                                <button type="button" class="btn btn-success add-email ms-2">+</button>
                            </div>
                        @endforelse
                    </div>
                    <button type="button" class="btn btn-success add-email mt-2">Add Email</button>
                </div>

                <!-- Phones -->
                <div class="mb-3">
                    <label>Phone Numbers</label>
                    <div id="phone-wrapper">
                        @forelse ($contact->phones ?? [] as $phone)
                            <div class="d-flex mb-2">
                                <input type="text" name="phones[]" class="form-control" value="{{ $phone }}">
                                <button type="button" class="btn btn-danger remove ms-2">-</button>
                            </div>
                        @empty
                            <div class="d-flex mb-2">
                                <input type="text" name="phones[]" class="form-control">
                                <button type="button" class="btn btn-success add-phone ms-2">+</button>
                            </div>
                        @endforelse
                    </div>
                    <button type="button" class="btn btn-success add-phone mt-2">Add Phone</button>
                </div>

                <!-- WhatsApp -->
                <div class="mb-3">
                    <label>WhatsApp Number</label>
                    <input type="text" name="whatsapp_no"
                           value="{{ old('whatsapp_no', $contact->whatsapp_no) }}"
                           class="form-control">
                </div>

                <!-- Map -->
                <div class="mb-3">
                    <label>Google Map Link</label>
                    <input type="text" name="map_link"
                           value="{{ old('map_link', $contact->map_link) }}"
                           class="form-control">
                </div>

                <button class="btn btn-primary">Update</button>
                <a href="{{ route('contactUs-master.index') }}" class="btn btn-secondary">Back</a>
            </form>

        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).on('click', '.add-email', function () {
    $('#email-wrapper').append(`
        <div class="d-flex mb-2">
            <input type="email" name="emails[]" class="form-control">
            <button type="button" class="btn btn-danger remove ms-2">-</button>
        </div>
    `);
});

$(document).on('click', '.add-phone', function () {
    $('#phone-wrapper').append(`
        <div class="d-flex mb-2">
            <input type="text" name="phones[]" class="form-control">
            <button type="button" class="btn btn-danger remove ms-2">-</button>
        </div>
    `);
});

$(document).on('click', '.remove', function () {
    $(this).parent().remove();
});
</script>

@endsection
