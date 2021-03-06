@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Registrar nuevo usuario</h3></div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nombre</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <label for="barber_id" class="col-md-4 control-label">Barberia</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="barber_id" id="barber_id">
                                        <option value="1">Barber 1</option>
                                        <option value="2">Barber 2</option>
                                        <option value="3">Barber 3</option>
                                    </select>
                                </div>
                            </div> -->

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Rol</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="rol" id="rol">
                                        <option value="barbero">Barbero</option>
                                        <option value="encargado">Encargado</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Barberia <a class="btn btn-xs btn-success" href="{{ route('barber.create') }}"> Nueva</a></label>
                                <div class="col-md-6">
                                    <select class="form-control" name="barber" id="barber">
                                        <option value="">-- SELECCIONA UNA BARBERIA --</option>
                                        @foreach($barbers as $barber)
                                        <option value="{{ $barber->id }}">{{ $barber->nombre }}</option>
                                        <!--<input type="hidden" name="barber_id" value="{{ $barber->id }}">-->
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Porcentaje</label>
                                <div class="col-md-6">
                                    <input id="porcent" type="number" step="any" class="form-control" name="porcent" required>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirmar Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registrar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
