@extends('layouts.base')
@section ('contenido')
<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Datos del trabajador</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="GET" action="/actualizartrabajador/{{$empleado->id}}">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$empleado->nombre}}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electronico') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$empleado->email}}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{$empleado->password}}" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{$empleado->password}}" required autocomplete="new-password">
                </div>
            </div>
            <div class="form-group row">
              <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de trabajor') }}</label>
              <div class="col-md-6">
              <select class="form-control" name="tipo" id="tipo">
                @if($empleado->role==1)
                <option value="admin" selected>Administrador</option>
                <option value="gerente">Gerente</option>
                <option value="vendedor">Vendedor</option>
                @elseif($empleado->role==3)
                <option value="admin">Administrador</option>
                <option value="gerente" selected>Gerente</option>
                <option value="vendedor">Vendedor</option>
                @else
                <option value="admin">Administrador</option>
                <option value="gerente">Gerente</option>
                <option value="vendedor" selected>Vendedor</option>
                @endif
              </select>
              </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
</div><!-- /.container-fluid -->
@endsection
