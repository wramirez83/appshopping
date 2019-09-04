@extends('layout/admin')

@section('titulo')
Modificar Usuarios - SENA
@endsection

@section('titulo_pagina')
Modificar Usuarios
@endsection

@section('cuerpo')

<div class="col-lg-12">
    <div class="card">
      @if(session('status'))
        <div class="alert alert-success">
          <strong>Usuario Creado</strong>
        </div>
      @endif
        <form action="{{ Route('buscarUsuario') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="card-header">
            <strong>Filtros Básicos</strong>
        </div>
        <div class="card-body card-block">
              {{ CSRF_FIELD() }}

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Nombre</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="nombre_usuario" class="form-control" >
                        <small class="form-text text-muted">Nombre a Buscar</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email-input" class=" form-control-label">Correo Electronico</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="email" id="email-input" name="correo" placeholder=" Email" class="form-control">
                        <small class="help-block form-text">Correo a Buscar</small>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email-input" class=" form-control-label">Documento</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="email-input" name="documento" placeholder=" Documento" class="form-control">
                        <small class="help-block form-text">Ingrese su correo</small>
                    </div>
                </div>


        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Buscar
            </button>
            <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Reset
            </button>
        </div>
    </div>
  </form>

</div>
@if(session('datos'))

<!-- listado de usuarios -->
<h3 class="title-5 m-b-35">Usuarios Existentes</h3>

<div class="table-responsive table-responsive-data2">
    <table class="table table-data2">
        <thead>
            <tr>
                <th>
                    <label class="au-checkbox">
                        <input type="checkbox">
                        <span class="au-checkmark"></span>
                    </label>
                </th>
                <th>Id</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Documento</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            <tr class="spacer"></tr>

            <tr class="spacer"></tr>

            <tr class="spacer"></tr>
            @foreach(session('datos') as $llaveRegistros)
            <tr class="tr-shadow">
                <td>
                    <label class="au-checkbox">
                        <input type="checkbox">
                        <span class="au-checkmark"></span>
                    </label>
                </td>
                <td>{{ $llaveRegistros->id_usuario }}</td>
                <td>
                    <span>{{ $llaveRegistros->nombre_usuario }}</span>
                </td>
                <td>
                  <span class="block-email">
                    {{ $llaveRegistros->correo }}
                  </span>
                </td>
                <td>{{ $llaveRegistros->documento }}</td>

                <td>
                    <div class="table-data-feature">
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                            <i class="zmdi zmdi-mail-send"></i>
                        </button>
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                            <i class="zmdi zmdi-edit"></i>
                        </button>
                        
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif

@endsection
@section('jsfoot')
<script type="text/javascript">
    $('#btnActualizarUsuario').addClass('active');
    $('#btnGestionApp').addClass('active');

    $.validate({
        lang: 'es'
    });
</script>
@endsection
