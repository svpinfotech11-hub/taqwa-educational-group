  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Dashboard</title>
      <!--begin::Accessibility Meta Tags-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
      <meta name="color-scheme" content="light dark" />
      <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
      <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
      <!--end::Accessibility Meta Tags-->
      <!--begin::Primary Meta Tags-->
      <meta name="title" content="AdminLTE v4 | Dashboard" />
      <meta name="author" content="ColorlibHQ" />
      <meta name="description"
          content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance." />
      <meta name="keywords"
          content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel, WCAG compliant" />
      <!--end::Primary Meta Tags-->
      <!--begin::Accessibility Features-->
      <!-- Skip links will be dynamically added by accessibility.js -->
      <meta name="supported-color-schemes" content="light dark" />
      <link rel="preload" href="{{ asset('assets2/css/adminlte.css') }}" as="style" />
      <!--end::Accessibility Features-->
      <!--begin::Fonts-->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
          integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" media="print"
          onload="this.media='all'" />
      <!--end::Fonts-->
      <!--begin::Third Party Plugin(OverlayScrollbars)-->
      <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
          crossorigin="anonymous" />
      <!--end::Third Party Plugin(OverlayScrollbars)-->
      <!--begin::Third Party Plugin(Bootstrap Icons)-->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
          crossorigin="anonymous" />
      <!--end::Third Party Plugin(Bootstrap Icons)-->
      <!--begin::Required Plugin(AdminLTE)-->
      <link rel="stylesheet" href="{{ asset('assets2/css/adminlte.cs') }}s" />
      <!--end::Required Plugin(AdminLTE)-->
      <!-- apexcharts -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
          integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous" />
      <!-- jsvectormap -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
          integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous" />

      <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css" />

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

      <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.css" rel="stylesheet">

      <style>
          .note-editable {
              font-size: 14px;
              /* Default font size */
              font-family: Arial, sans-serif;
              /* Optional: default font */
          }
      </style>

      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <script>
          document.addEventListener('change', function(e) {

              if (e.target.name === 'images[]') {
                  const file = e.target.files[0];

                  if (file && !file.type.startsWith('image/')) {

                      Swal.fire({
                          icon: 'error',
                          title: 'Invalid Image',
                          text: 'Please select a valid image file (jpg, png, jpeg, webp)',
                          confirmButtonText: 'OK'
                      });

                      e.target.value = '';
                  }
              }

              if (e.target.name === 'videos[]') {
                  const file = e.target.files[0];

                  if (file && !file.type.startsWith('video/')) {

                      Swal.fire({
                          icon: 'error',
                          title: 'Invalid Video',
                          text: 'Please select a valid video file (mp4, mov, avi, mkv)',
                          confirmButtonText: 'OK'
                      });

                      e.target.value = '';
                  }
              }

          });
      </script>

  </head>
