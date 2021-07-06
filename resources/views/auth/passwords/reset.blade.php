@extends('layouts.app')

@section('content')
<div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="/images/logo.svg" alt="{{ config('app.name', 'Laravel') }}">
                </div>
                <h4>Reset Password</h4>
                <form class="pt-3" method="post" action="{{ route('password.request') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ $token }}">
                  <div class="form-group">
                    <input type="email" class="form-control {{$errors->has('email') ? ' form-control-danger' : '' }} form-control-lg" id="exampleInputEmail1" name="email" value="{{ $email or old('email') }}" required="required" autofocus>
                    @if ($errors->has('email'))
                    <label id="cemail-error" class="error mt-2 text-danger" for="cemail">{{ $errors->first('email') }}</label>
                   @endif
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control {{  $errors->has('password') ? 'form-control-danger' : '' }} form-control-lg" id="exampleInputPassword1" placeholder="Password">
                      @if ($errors->has('password'))
                      <label id="cemail-error" class="error mt-2 text-danger" for="cemail">{{   $errors->first('password') }}</label>
                   @endif
                  </div>
                  <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control {{  $errors->has('password_confirmation') ? 'form-control-danger' : '' }} form-control-lg" id="exampleInputPassword2" placeholder="Password">
                      @if ($errors->has('password_confirmation'))
                      <label id="cemail-error" class="error mt-2 text-danger" for="cemail">{{   $errors->first('password_confirmation') }}</label>
                   @endif
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                  </div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
@endsection
