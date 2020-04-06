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
                <h1 class="h4 text-gray-900 text-uppercase">Medical Practitioner's Registration</h1>
                 <hr>
              </div>
              @if (session('status'))
                <div class="alert alert-danger fade show" role="alert">
                    {{ session('status') }}
                </div>
              @endif

              <form class="user" method="POST" action="{{ route('practitioner.register.submit') }}">
                @csrf

                <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                  <input type="text" class="form-control form-control-user" name="firstname" id="exampleFirstName" value="{{ old('firstname') ?? '' }}" placeholder="First Name" autocomplete="off" required>
                    <div class="text-danger small mt-2">{{ $errors->first('firstname') }}</div>
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" name="middlename" id="exampMiddleName" value="{{ old('middlename') ?? '' }}" placeholder="Middle Name"  autocomplete="off" required>
                    <div class="text-danger small mt-2">{{ $errors->first('middlename') }}</div>
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" name="lastname" id="exampleLastName" value="{{ old('lastname') ?? '' }}" placeholder="Last Name" autocomplete="off" required>
                    <div class="text-danger small mt-2">{{ $errors->first('lastname') }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" value="{{ old('email') ?? '' }}" placeholder="Email Address" autocomplete="off" required>
                    <div class="text-danger small mt-2">{{ $errors->first('email') }}</div>
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" name="national_id" id="exampleUserName" value="{{ old('national_id') ?? '' }}" placeholder="NIN/Driver's License/Voter's Card" autocomplete="off" required>
                    <div class="text-danger small mt-2">{{ $errors->first('national_id') }}</div>
                  </div>
                  <div class="col-sm-4">  
                    
                    <input type="text" class="form-control form-control-user" name="phone" id="examplePhone" placeholder="Phone" value="{{ old('phone') ?? '' }}" placeholder="Phone" autocomplete="off" required>
                    <div class="text-danger small mt-2">{{ $errors->first('phone') }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-4 mt-2 mb-sm-0">
                    <select name="profession" id="" class="form-control" required>
                      <option value="0">Nurse</option>
                      <option value="1">Physician</option>
                      <option value="2">Lab. Tech</option>
                      <option value="3">Pharmacy</option>
                    </select>
                    <div class="text-danger small mt-2">{{ $errors->first('profession') }}</div>
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" name="license" id="" value="{{ old('license') ?? '' }}" placeholder="License Number" autocomplete="off" required>
                    <div class="text-danger small mt-2">{{ $errors->first('license') }}</div>
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" name="specialty" id="exampleSpecialty" value="{{ old('specialty') ?? '' }}" placeholder="Specialty" autocomplete="off" required>
                    <div class="text-danger small mt-2">{{ $errors->first('specialty') }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-sm-0">
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
                <a class="small" href="{{route('practitioner.login')}}">Already have an account? Login!</a>
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