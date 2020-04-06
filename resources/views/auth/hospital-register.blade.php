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
                <h1 class="h4 text-gray-900 text-uppercase">Hospital Registration</h1>
                 <hr>
              </div>
              @if (session('status'))
                <div class="alert alert-danger fade show" role="alert">
                    {{ session('status') }}
                </div>
              @endif

              <form class="user" method="POST" action="{{ route('hospital.register.submit') }}">
                @csrf

                <div class="form-group row">
                  <div class="col-sm-4 mb-sm-0">
                  <input type="text" class="form-control form-control-user" name="name" id="exampleName" value="{{ old('name') ?? '' }}" placeholder="Name" autocomplete="off" required>
                    <div class="text-danger small mt-2">{{ $errors->first('name') }}</div>
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" name="middlename" id="exampleOtherName" value="{{ old('othernames') ?? '' }}" placeholder="Other Names"  autocomplete="off" required>
                    <div class="text-danger small mt-2">{{ $errors->first('othername') }}</div>
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" name="country" id="exampleCountry" value="{{ old('country') ?? '' }}" placeholder="Country" autocomplete="off" required>
                    <div class="text-danger small mt-2">{{ $errors->first('country') }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-4 mb-sm-0">
                    <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" value="{{ old('email') ?? '' }}" placeholder="Email Address" autocomplete="off" required>
                    <div class="text-danger small mt-2">{{ $errors->first('email') }}</div>
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" name="tin" id="exampleUserName" value="{{ old('tin') ?? '' }}" placeholder="Tax Identification Number" autocomplete="off" required>
                    <div class="text-danger small mt-2">{{ $errors->first('tin') }}</div>
                  </div>
                  <div class="col-sm-4">       
                    <input type="text" class="form-control form-control-user" name="phone" id="examplePhone" placeholder="Phone" value="{{ old('phone') ?? '' }}" placeholder="Phone" autocomplete="off" required>
                    <div class="text-danger small mt-2">{{ $errors->first('phone') }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-4 mb-sm-0">
                    <select name="state" id="" class="form-control" required>
                      <option value="0">Abia</option>
                      <option value="1">Adamawa</option>
                      <option value="2">Akwa Ibom</option>
                      <option value="3">Anambra</option>
                      <option value="3">Bauchi</option>
                    </select>
                   
                    <div class="text-danger small mt-2">{{ $errors->first('state') }}</div>
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" name="lga" id="" value="{{ old('lga') ?? '' }}" placeholder="Local Govt. Area" autocomplete="off" required>
                    <div class="text-danger small mt-2">{{ $errors->first('lga') }}</div>
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" name="contact_phone1" id="exampleSpecialty" value="{{ old('contact_phone1') ?? '' }}" placeholder="Contact Phone" autocomplete="off" required>
                    <div class="text-danger small mt-2">{{ $errors->first('contact_phone1') }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-4 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="emg_phone1" id="" value="{{ old('emg_phone1') ?? '' }}" placeholder="Emergency Number 1" autocomplete="off" required>
                    <div class="text-danger small mt-2">{{ $errors->first('emg_phone1') }}</div>
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" name="emg_phone2" id="" value="{{ old('emg_phone2') ?? '' }}" placeholder="Emergency Number 2" autocomplete="off" required>
                    <div class="text-danger small mt-2">{{ $errors->first('emg_phone2') }}</div>
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" name="postal" id="examplePostal" value="{{ old('postal') ?? '' }}" placeholder="Postal Number" autocomplete="off" required>
                    <div class="text-danger small mt-2">{{ $errors->first('postal') }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
                    <div class="text-danger small mt-2">{{ $errors->first('password') }}</div>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="password_confirmation" id="exampleRepeatPassword" placeholder="Repeat Password">
                    
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
                <a class="small" href="{{route('hospital.login')}}">Already have an account? Login!</a>
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