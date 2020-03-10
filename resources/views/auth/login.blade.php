@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
  <div class="login-box">
    <div class="login-logo">
     <img src="{{asset('/dist/img/LOGO2.png')}}" width="100px" height="100px" alt="">
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Inicia sesión para continuar</p>

        <form method="POST" action="{{ route('login') }}">
          <!--inicia el formulario-->
          <div class="input-group mb-3">

            <input type="username" class="form-control" placeholder="Usuario">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="input-group-append">
              <div class="input-group-text">
              <i class="fas fa-user"></i>
              <!--<img src="/img/monito.png" width="20px" height="20px" alt=""> -->
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Contraseña">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Recuerdame
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Acceder</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Olvidé mi contraseña') }}
            </a>
        @endif

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
</div>
</div>
@endsection
