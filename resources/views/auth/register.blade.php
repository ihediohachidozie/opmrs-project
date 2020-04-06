@include('layouts.inc.head')
<body class="bg-gradient-primary">
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-signup-img">
            <img src="{{ asset('theme/img/sign-up.jpg') }}" alt="" srcset="">
          </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 text-uppercase">Patient's Registration</h1>
                <hr>
              </div>
              <form class="user" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="firstname" id="exampleFirstName" placeholder="First Name" autocomplete="off">
                    <div class="text-danger small mt-2">{{ $errors->first('firstname') }}</div>
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" name="middlename" id="exampMiddleName" placeholder="Middle Name"autocomplete="off">
                    <div class="text-danger small mt-2">{{ $errors->first('middlename') }}</div>
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" name="lastname" id="exampleLastName" placeholder="Last Name"autocomplete="off">
                    <div class="text-danger small mt-2">{{ $errors->first('lastname') }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" placeholder="Email Address" autocomplete="off">
                    <div class="text-danger small mt-2">{{ $errors->first('email') }}</div>
                  </div>
                  <div class="col-sm-4">  
                    <input type="text" class="form-control form-control-user" name="national_id" id="exampleUserName" placeholder="National Identity Number/Driver's License/Voter's Card" autocomplete="off">
                    <div class="text-danger small mt-2">{{ $errors->first('national_id') }}</div>
                  </div>
                  <div class="col-sm-4">  
                    <input type="text" class="form-control form-control-user" name="phone" id="examplePhone" placeholder="Phone" autocomplete="off">
                    <div class="text-danger small mt-2">{{ $errors->first('phone') }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
                    <div class="text-danger small mt-2">{{ $errors->first('password') }}</div>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="password_confirmation" id="exampleRepeatPassword" placeholder="Repeat Password">
                    <div class="text-danger small mt-2">{{ $errors->first('password') ? 'Repeat password required' : '' }}</div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="{{route('login')}}">Already have an account? Login!</a>
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
</body>