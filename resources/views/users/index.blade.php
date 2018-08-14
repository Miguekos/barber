@extends('layouts.app')

@section('content')
<h3>Usuarios <a class="pull-right btn btn-xs btn-default" href="{{ route('register') }}">Nuevo Usuario</a></h3>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Nombre</th>
                              <th>Email</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach($user as $users)
                          <tr>
                              <td>{{ $users->id }}</td>
                              <td>{{ $users->name }}</td>
                              <td>{{ $users->email }}</td>
                              <td width="17%">
                                  <form action="">
                                      <!-- <a class="btn btn-sm btn-default">Ver</a> -->
                                      <a href="{{ route('user.edit',$users->id) }}" class="btn btn-sm btn-info">Editar</a>
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
