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
                @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <form class="pt-3" method="post" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                  <div class="form-group">
                    <input type="email" class="form-control {{$errors->has('email') ? ' form-control-danger' : '' }} form-control-lg" id="exampleInputEmail1" name="email" value="{{ old('email') }}" required="required">
                    @if ($errors->has('email'))
                    <label id="cemail-error" class="error mt-2 text-danger" for="cemail">{{ $errors->first('email') }}</label>
                   @endif
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
                  </div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
@endsection
