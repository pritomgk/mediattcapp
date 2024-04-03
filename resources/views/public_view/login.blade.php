@extends('public_view.layout.app')

@section('title')
Media TTC - Log in
@endsection
@section('content')
<div class="site-section">
  <div class="container mt-5">
      <div class="row justify-content-center">
          <div class="col-md-5 mt-5">
              <div class="row">
									@php
										if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
											$cookie_email = $_COOKIE['email'];
											$cookie_password = $_COOKIE['password'];
											$cookie_set = 'checked';
										}else {
											$cookie_email = '';
											$cookie_password = '';
											$cookie_set = '';
										}
									@endphp
                  <br>
                  @if (session()->has('error'))
                    <p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
                  @endif
                  @if (session()->has('success'))
                    <p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
                  @endif
                  <form class="col-md-12" action="{{ route('check_login') }}" method="POST">
                    @csrf
                    <div class="col-md-12 form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" value="{{ $cookie_email }}" name="email" class="form-control form-control-lg" />
												@error('email')
												<p class="mb-0 alert alert-danger">{{ $message }}</p>
												@enderror
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" value="{{ $cookie_password }}" name="password" class="form-control form-control-lg" />
                        @error('password')
                        <p class="mb-0 alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" name="rememberme" role="switch" id="rememberme" checked>
                      <label class="form-check-label" for="rememberme">Remeber Me</label>
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="submit" value="Log In" class="form-control form-control-lg bg-primary text-white" style="cursor: pointer;" />
                    </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection


