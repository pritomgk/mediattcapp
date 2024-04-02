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
                  <form class="col-md-12" action="{{ route('check_login') }}" method="POST">
                    @csrf
                    <div class="col-md-12 form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control form-control-lg" />
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control form-control-lg" />
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" name="rememberme" role="switch" id="rememberme" checked>
                      <label class="form-check-label" for="rememberme">Checked switch checkbox input</label>
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
