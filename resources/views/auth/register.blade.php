@extends('layouts.app')

@section('content')
<style>
.containers {
  max-width: 100%;
  background-color: #212763;
  margin: auto;
  padding: 100px 30px 87px;
}

.logo {
  margin-bottom: 56px;
}

.logo img {
  width: 60%;
}

h1 {
  color: white;
}

.form-group {
  position: relative;
  margin-bottom: 15px;
}

.form-control {
  background: transparent;
  border: none;
  font-size: 18px;
  height: 50px;
  color: white;
  border: 1px solid transparent;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 40px;
  padding: 15px 20px 17px;
  -webkit-transition: 0.3s;
  -o-transition: 0.3s;
  transition: 0.3s;
}

.form-control:hover,
.form-control:focus {
  background: transparent;
  outline: none;
  -webkit-box-shadow: none;
  box-shadow: none;
  color: white;
  border-color: rgba(255, 255, 255, 0.4);
}

.btn.btn-primary {
  background: #f7db1b;
  border: 1px solid #f7db1b;
  color: #000;
  font-weight: bold;
  box-shadow: 0 0 10px rgba(0,0,0,0.4);
}

.btn {
  cursor: pointer;
  border-radius: 40px;
  -webkit-box-shadow: none;
  box-shadow: none;
  font-size: 16px;
  text-transform: uppercase;
  padding: 10px;
}

.btn.btn-primary:hover{
  box-shadow: 0 0 30px rgba(0,0,0,0.4);
  transform: scale(1.05);
}

</style>
<div class="containers">
  <div class="row justify-content-center">
    <div class="col-md-6 text-center mb-5">
      <div class="logo"><img src="../images/neweralogo.png"></div>
      <h1 class="mt-2">REGISTER</h1>
    </div>
  </div>
  <div class="row justify-content-center mt-4">
    <div class="col-md-6 col-lg-3">
      <div class="p-0">

        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="form-group">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
              value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
              value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">

            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
              name="password" required autocomplete="new-password" placeholder="Password">

            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
              autocomplete="new-password" placeholder="Confirm Password">
          </div>

          <div class="form-group">
              <button type="submit" class="form-control btn btn-primary">
                {{ __('Register') }}
              </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
