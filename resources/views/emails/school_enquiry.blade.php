<h2>New School Enquiry</h2>

<p><strong>School:</strong> {{ $school->name }}</p>
<p><strong>School URL:</strong> {{ url('pages/' . $school->slug) }}</p>

<hr>

<p><strong>Name:</strong> {{ $enquiry->name }}</p>
<p><strong>Email:</strong> {{ $enquiry->email }}</p>
<p><strong>Phone:</strong> {{ $enquiry->phone }}</p>
<p><strong>Institution:</strong> {{ $enquiry->institution }}</p>
<p><strong>Branch:</strong> {{ $enquiry->branch }}</p>

<p><strong>Message:</strong></p>
<p>{{ $enquiry->message }}</p>
