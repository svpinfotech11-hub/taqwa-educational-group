@extends('admin.partials.app')
@section('main-content')

<!--begin::App Content Header-->
<div class="app-content-header">
  <!--begin::Container-->
  <div class="container-fluid">
    <!--begin::Row-->
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mb-0">
          <p>
            @if (strtolower(Auth::user()->role) === 'superadmin')
            Admin Users
            @else
            {{ ucfirst(Auth::user()->role) }} Users
            @endif
          </p>
        </h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
      <!--<div class="col-lg-3 col-6">-->
      <!--  <div class="small-box text-bg-primary">-->
      <!--    <div class="inner">-->
      <!--      <h3></h3>-->
      <!--      <p>Admin Users</p>-->
      <!--    </div>-->
          
      <!--  </div>-->
      <!--</div>-->

      <!--<div class="col-lg-3 col-6">-->
      <!--  <div class="small-box text-bg-success">-->
      <!--    <div class="inner">-->
      <!--      <h3></h3>-->
      <!--      <p>Accounts Users</p>-->
      <!--    </div>-->
          
      <!--  </div>-->
      <!--</div>-->

      <!--<div class="col-lg-3 col-6">-->
      <!--  <div class="small-box text-bg-warning">-->
      <!--    <div class="inner">-->
      <!--      <h3></h3>-->
      <!--      <p>Supervisor Users</p>-->
      <!--    </div>-->
         
      <!--  </div>-->
      <!--</div>-->

      <!--<div class="col-lg-3 col-6">-->
      <!--  <div class="small-box text-bg-info">-->
      <!--    <div class="inner">-->
      <!--      <h3></h3>-->
      <!--      <p>Employee Users</p>-->
      <!--    </div>-->
          
      <!--  </div>-->
      <!--</div>-->

    <!--  <div class="col-lg-3 col-6 mt-3">-->
    <!--    <div class="small-box text-bg-danger">-->
    <!--      <div class="inner">-->
    <!--        <h3></h3>-->
    <!--        <p>Client Users</p>-->
    <!--      </div>-->
         
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->

    <!--end::Row-->
    <!--begin::Row-->

    <!-- /.row (main row) -->
  </div>
  <!--end::Container-->
</div>
<!--end::App Content-->


@endsection