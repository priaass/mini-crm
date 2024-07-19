
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login Mini CRM</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  {{-- <link href="../../img/favicon.png" rel="icon">
  <link href="../../img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../css/style.css" rel="stylesheet">

    {{-- Sweet alert --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>        
<body>   

  <main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-lg-4 col-md-5 d-flex flex-column align-items-center justify-content-center">

                <div class="card mb-3">

                <div class="card-body pb-5">

                    <div class="pb-4">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your email & password to login</p>
                    </div>
                    {{-- @include('_message') --}}
                    <form class="row g-3 needs-validation" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="col-12">
                            <label for="yourUsername" class="form-label">Username</label>
                            <div class="input-group has-validation">
                            <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                            @error('email')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="yourPassword" class="form-label">Password</label>
                            <input class="form-control" type="password" id="password" name="password" value="{{ old('password') }}" required autofocus autocomplete="current-password">
                            @error('password')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" value="true" id="remember_me">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">Login</button>
                        </div>
                    </form>

                </div>
                </div>

            </div>
            </div>
        </div>

        </section>

    </div>
</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="../../vendor/apexcharts/apexcharts.min.js"></script>
<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../vendor/chart.js/chart.umd.js"></script>
<script src="../../vendor/echarts/echarts.min.js"></script>
<script src="../../vendor/quill/quill.js"></script>
<script src="../../vendor/simple-datatables/simple-datatables.js"></script>
<script src="../../vendor/tinymce/tinymce.min.js"></script>
<script src="../../vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="../../js/main.js"></script>

{{-- Sweet alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('status'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'info',
                title: 'Sukses!',
                showConfirmButton: false,
                timer: 1500,
                text: '{{ session('status') }}'
            });
        });
    </script>
@endif

</body>

</html>
