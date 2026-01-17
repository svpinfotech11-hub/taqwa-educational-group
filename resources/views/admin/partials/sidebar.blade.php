  <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">

      <!--begin::Sidebar Brand-->
      <div class="sidebar-brand">
          <!--begin::Brand Link-->

          <a href="" class="brand-link">
              <img src="{{ asset('assets2/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                  class="brand-image opacity-75 shadow" />
              <span class="brand-text fw-light">Dashboard</span>
          </a>

          <!--end::Brand Link-->
      </div>
      <!--end::Sidebar Brand-->
      <!--begin::Sidebar Wrapper-->
      <div class="sidebar-wrapper">
          <nav class="mt-2">
              <!--begin::Sidebar Menu-->
              <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                  aria-label="Main navigation" data-accordion="false" id="navigation">
                  <li class="nav-item menu-open">
                      <a href="#" class="nav-link active">
                          <i class="nav-icon fas fa-home" style="color: white"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                      {{--  @if (Auth::check() && Auth::user()->role && Auth::user()->role->name === 'superadmin')  --}}

                      @if (hasPermission('users'))
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon bi bi-box-seam-fill"></i>
                          <p>
                              Users
                              <i class="nav-arrow bi bi-chevron-right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('users.create') }}" class="nav-link">
                                  <i class="nav-icon bi bi-circle"></i>
                                  <p>Add New</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('users.index') }}" class="nav-link">
                                  <i class="nav-icon bi bi-circle"></i>
                                  <p>All Records</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  @endif
                  @if (hasPermission('banners'))
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon bi bi-box-seam-fill"></i>
                              <p>
                                  Home Banners
                                  <i class="nav-arrow bi bi-chevron-right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('banner.create') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>Add New</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('banner.index') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>All Records</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  @endif

                  @if (hasPermission('chairman-messages'))
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon bi bi-box-seam-fill"></i>
                              <p>
                                  ChairmanMessage
                                  <i class="nav-arrow bi bi-chevron-right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('chairman-messages.create') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>Add New</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('chairman-messages.index') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>All Records</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  @endif
                  {{--  @if (hasPermission('about-page'))
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon bi bi-box-seam-fill"></i>
                              <p>
                                  About
                                  <i class="nav-arrow bi bi-chevron-right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('about-page.create') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>Add New</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('about-page.index') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>All Records</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  @endif  --}}
                  @if (hasPermission('neet-domiciles'))
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon bi bi-box-seam-fill"></i>
                              <p>
                                  Neet Domiciles
                                  <i class="nav-arrow bi bi-chevron-right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('neet-domiciles.create') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>Add New</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('neet-domiciles.index') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>All Records</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  @endif
                  @if (hasPermission('video-gallery'))
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon bi bi-box-seam-fill"></i>
                              <p>
                                  Video Gallery
                                  <i class="nav-arrow bi bi-chevron-right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('video-gallery.create') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>Add New</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('video-gallery.index') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>All Records</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  @endif
                  @if (hasPermission('mission-vision'))
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon bi bi-box-seam-fill"></i>
                              <p>
                                  Mission & Vision
                                  <i class="nav-arrow bi bi-chevron-right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('mission-vision.create') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>Add New</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('mission-vision.index') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>All Records</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  @endif
                  @if (hasPermission('results-master'))
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon bi bi-box-seam-fill"></i>
                              <p>
                                  Results
                                  <i class="nav-arrow bi bi-chevron-right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('results-master.create') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>Add New</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('results-master.index') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>All Records</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  @endif
                  @if (hasPermission('subpage_banners'))
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon bi bi-box-seam-fill"></i>
                              <p>
                                  Sub Page Banner
                                  <i class="nav-arrow bi bi-chevron-right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('subpage_banners.create') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>Add New</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ url('subpage_banners/index') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>All Records</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  @endif
                  @if (hasPermission('galleries'))
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon bi bi-box-seam-fill"></i>
                              <p>
                                  Gallery
                                  <i class="nav-arrow bi bi-chevron-right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('galleries.create') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>Add New</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('galleries.index') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>All Records</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  @endif
                  @if (hasPermission('news'))
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon bi bi-box-seam-fill"></i>
                              <p>
                                  News
                                  <i class="nav-arrow bi bi-chevron-right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('news.create') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>Add New</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('news.index') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>All Records</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  @endif
                  @if (hasPermission('schools-master'))
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon bi bi-box-seam-fill"></i>
                              <p>
                                  Schools
                                  <i class="nav-arrow bi bi-chevron-right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('schools-master.create') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>Add New</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('schools-master.index') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>All Records</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  @endif
                  @if (hasPermission('category'))
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon bi bi-box-seam-fill"></i>
                              <p>
                                  Admission Categories
                                  <i class="nav-arrow bi bi-chevron-right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('admin.category.create') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>Add New</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('admin.category.index') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>All Records</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  @endif
                  @if (hasPermission('conferences'))
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon bi bi-box-seam-fill"></i>
                              <p>
                                  Conferences
                                  <i class="nav-arrow bi bi-chevron-right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('conferences.create') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>Add New</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('conferences.index') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>All Records</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  @endif
                  @if (hasPermission('conferences_detail'))
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon bi bi-box-seam-fill"></i>
                              <p>
                                  Conferences Details
                                  <i class="nav-arrow bi bi-chevron-right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('conferences_detail.create') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>Add New</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('conferences_detail.index') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>All Records</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  @endif
                  @if (hasPermission('events'))
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon bi bi-box-seam-fill"></i>
                              <p>
                                  Events
                                  <i class="nav-arrow bi bi-chevron-right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('events.create') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>Add New</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('events.index') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>All Records</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  @endif
                  @if (hasPermission('contactUs-master'))
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon bi bi-box-seam-fill"></i>
                              <p>
                                  Contact Us
                                  <i class="nav-arrow bi bi-chevron-right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('contactUs-master.create') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>Add New</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('contactUs-master.index') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>All Records</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  @endif
                  @if (hasPermission('about-page'))
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon bi bi-box-seam-fill"></i>
                              <p>
                                  About
                                  <i class="nav-arrow bi bi-chevron-right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('about-page.create') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>Add New</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('about-page.index') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>All Records</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  @endif
                  @if (hasPermission('course-categories'))
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon bi bi-box-seam-fill"></i>
                              <p>
                                  Course Categories
                                  <i class="nav-arrow bi bi-chevron-right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('course-categories.create') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>Add New</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('course-categories.index') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>All Records</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  @endif
                  @if (hasPermission('courses-master'))
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon bi bi-box-seam-fill"></i>
                              <p>
                                  Courses
                                  <i class="nav-arrow bi bi-chevron-right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('courses-master.create') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>Add New</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('courses-master.index') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>All Records</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  @endif
                  @if (hasPermission('homeabout'))
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon bi bi-box-seam-fill"></i>
                              <p>
                                  Home About Page
                                  <i class="nav-arrow bi bi-chevron-right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('homeabout.create') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>Add New</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ url('homeabout/index') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>All Records</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  @endif
                  @if (hasPermission('school-members'))
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon bi bi-box-seam-fill"></i>
                              <p>
                                  School Details
                                  <i class="nav-arrow bi bi-chevron-right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('school-members.create') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>Add New</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ url('school-members/index') }}" class="nav-link">
                                      <i class="nav-icon bi bi-circle"></i>
                                      <p>All Records</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  @endif
                  {{-- ===== ROLE & PERMISSION (Only Super Admin) ===== --}}

                  @php
                      $permissions = auth()->user()->permissions;

                      if (is_string($permissions)) {
                          $permissions = json_decode($permissions, true);
                      }

                      $isSuperAdmin = is_array($permissions) && in_array('all', $permissions);
                  @endphp

                  @if ($isSuperAdmin)
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon bi bi-shield-lock"></i>
                              <p>
                                  Access Control
                                  <i class="nav-arrow bi bi-chevron-right"></i>
                              </p>
                          </a>

                          <ul class="nav nav-treeview">

                              <li class="nav-item">
                                  <a href="{{ route('roles.index') }}" class="nav-link">
                                      <i class="nav-icon bi bi-people"></i>
                                      <p>Roles</p>
                                  </a>
                              </li>

                              <li class="nav-item">
                                  <a href="{{ route('roles.create') }}" class="nav-link">
                                      <i class="nav-icon bi bi-person-plus"></i>
                                      <p>Add Role</p>
                                  </a>
                              </li>

                          </ul>
                      </li>
                  @endif



                  <!-- <li class="nav-item">

    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
      <!--begin::Brand Link-->

      <a href="" class="brand-link">
        <img
          src="{{ asset('assets2/img/AdminLTELogo.png') }}"
          alt="AdminLTE Logo"
          class="brand-image opacity-75 shadow" />
        <span class="brand-text fw-light">Dashboard</span>
      </a>

      <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
      <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul
          class="nav sidebar-menu flex-column"
          data-lte-toggle="treeview"
          role="navigation"
          aria-label="Main navigation"
          data-accordion="false"
          id="navigation">
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-home" style="color: white"></i>
              <p>
                Dashboard
              </p>
            </a>
        @if(Auth::check() && Auth::user()->role === 'superadmin')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>
                Users
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.create') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>All Records</p>
                </a>
              </li>
            </ul>
          </li>

            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>
                Home Banners
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('banner.create') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('banner.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>All Records</p>
                </a>
              </li>
            </ul>
          </li>

              <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>
                ChairmanMessage
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('chairman-messages.create') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('chairman-messages.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>All Records</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>
                About
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('about-page.create') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('about-page.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>All Records</p>
                </a>
              </li>
            </ul>
          </li>


           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>
                Neet Domiciles
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('neet-domiciles.create') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('neet-domiciles.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>All Records</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>
               Video Gallery
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('video-gallery.create') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('video-gallery.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>All Records</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>
                Mission & Vision
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('mission-vision.create') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('mission-vision.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>All Records</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>
                Results
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('results-master.create') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('results-master.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>All Records</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>
                Sub Page Banner
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('subpage_banners.create') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('subpage_banners/index') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>All Records</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>
                Gallery
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('galleries.create') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route( 'galleries.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>All Records</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>
                News
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('news.create') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('news.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>All Records</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>
                Schools
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('schools-master.create') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('schools-master.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>All Records</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>
                Admission Categories
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.category.create') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.category.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>All Records</p>
                </a>
              </li>
            </ul>
          </li>


             <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>
                Conferences
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('conferences.create') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('conferences.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>All Records</p>
                </a>
              </li>
            </ul>
          </li>


            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>
               Conferences Details
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('conferences_detail.create') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('conferences_detail.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>All Records</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>
               Events
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('events.create') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('events.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>All Records</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>
                Contact Us
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('contactUs-master.create') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('contactUs-master.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>All Records</p>
                </a>
              </li>
            </ul>
          </li>

        

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>
                Course Categories
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('course-categories.create') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('course-categories.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>All Records</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>
                Courses
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('courses-master.create') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('courses-master.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>All Records</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>
                Home About Page
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('homeabout.create') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('homeabout/index') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>All Records</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>
                School Details
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('school-members.create') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('school-members/index') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>All Records</p>
                </a>
              </li>
            </ul>
          </li>
         
          <!-- <li class="nav-item">

            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>
                School Details
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('school-members.create') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('school-members/index') }}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>All Records</p>
                </a>
              </li>
            </ul>
          </li> -->
                  {{--  @endif  --}}
              </ul>
              </li>
              </ul>
              <!--end::Sidebar Menu-->
          </nav>
      </div>
      <!--end::Sidebar Wrapper-->
  </aside>
