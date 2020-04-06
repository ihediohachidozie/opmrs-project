@include('layouts.inc.head')
<body class="bg-gradient-primary">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-img">
                <img src="{{ asset('theme/img/sign-in.jpg') }}" alt="" srcset="">
              </div>
                <div class="col-lg-6">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 text-uppercase">Practitioner's Login</h1>
                      <hr>

                      @if (session('status'))
                        <div class="alert alert-danger fade show" role="alert">
                          {{ session('status') }}

                        </div>
                      @endif

                    </div>
                    <form class="user form-prevent-multiple-submits" method="POST" action="{{ route('practitioner.login.submit') }}">
                      @csrf

                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="username" id="exampleInputUsername" aria-describedby="emailHelp" value="{{old('username') ?? ''}}" placeholder="Enter Phone  or Email..." autocomplete="off" autofocus required>
                        <div class="text-danger small mt-2">{{ $errors->first('phone') ? 'Email or Phone required' : '' }}</div>
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
                        <div class="text-danger small mt-2">{{ $errors->first('password') }}</div>
                      </div>
                      <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                          <input type="checkbox" class="custom-control-input" id="customCheck">
                          <label class="custom-control-label" for="customCheck">Remember Me</label>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary btn-user btn-block button-prevent-multiple-submits" >
                        Login
                      </button>
                    </form>
                    <hr>
                    <div class="text-center">
                      <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                      <a class="small" href="{{route('practitioner.register')}}">Create an Account!</a>
                    </div>
                    <div class="text-center">
                      <a class="small" href="/">Back to Home</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="{{ asset('js/submit.js') }}"></script>
