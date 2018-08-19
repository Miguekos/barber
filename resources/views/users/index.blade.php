@extends('layouts.app')

@section('content')
<h1>Usuarios <small class="pull-right"><a class="btn btn-xs btn-success" href="{{ route('register') }}">Nuevo Usuario</a></small></h1>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Nombre</th>
                              <th>Email</th>
                              <th>Porcentaje</th>
                              <th>Barberia</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach($user as $users)
                          <tr>
                              <td>{{ $users->id }}</td>
                              <td>{{ $users->name }}</td>
                              <td>{{ $users->email }}</td>
                              <td>{{ $users->porcent }}</td>
                              <td>{{ $users->barber }}</td>
                              <td width="17%">
                                  <form action="">
                                      <!-- <a class="btn btn-sm btn-default">Ver</a> -->
                                      <a href="{{ route('user.edit',$users->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                      <!-- <a class="btn btn-sm btn-default">Eliminar</a> -->
                                  </form>
                              </td>
                          </tr>
                      </tbody>
                      @endforeach
                  </table>
                  </div>
              </div>
            </div>

@endsection
