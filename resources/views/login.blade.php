<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Masuk</title>
  <!-- Favicon -->
  <link href="{{ asset('/img/brand/favicon.png') }}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ asset('/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
  <link href="{{ asset('/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="{{asset('/css/argon.css?v=1.0.0')}}" rel="stylesheet">
</head>

<body style="background-color:#ededed">
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1>Fahmi Handycraft</h1>
              <h2>Produk Handmade</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
              </div>
              <form role="form" action="{{ route('login.submit') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" name="email" type="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Kata Sandi" name="password" type="password">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-danger my-4">Masuk</button>
                </div>
              </form>
            </div>
          </div>
          @if($errors->has('password'))
          {{ $errors->first('password') }}
          @endif
          <div class="row mt-3">
          </div>
        </div>
        <!-- END CARD -->
      </div>
    </div>

    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{asset('/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('assets/js/argon.js?v=1.0.0')}}"></script>
</body>

</html>
