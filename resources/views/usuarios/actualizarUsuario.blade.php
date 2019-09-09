@extends('layout/admin')
    @section('titulo')
        Actualizar Usuarios - SENA
    @endsection
    @section('titulo_pagina')
        Actualizar Usuarios
    @endsection
@section('cuerpo')
<div class="col-lg-12">
    <div class="card">
      @if($errors->any())
        <div class="alert alert-danger">
          @foreach($errors->all() as $llaveError)
            {{ $llaveError }} <br/>
          @endforeach
        </div>
      @endif
      @if(session('status'))
        @if(session('status') == 'ok')
        <div class="alert alert-success">
          <strong>Usuario Actualizado</strong>
        </div>
        @endif
        @if(session('status') == 'noOk')
        <div class="alert alert-danger">
          <strong>Usuario NO Creado</strong>
        </div>
        @endif
      @endif
        <form action="{{ Route('actualizandoUsuario') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="card-header">
            <strong>Datos Básicos</strong>
        </div>
        <div class="card-body card-block">
              {{ CSRF_FIELD() }}
              <input type="hidden" name="id_usuario" value="{{ $usuario->id_usuario}}">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Nombre Completo</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="nombre_usuario" name="nombre_usuario" class="form-control" required data-validation="required" value="{{ $usuario->nombre_usuario}}">
                        <small class="form-text text-muted">Nombre Completo de Usuario</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email-input" class=" form-control-label">Correo Electronico</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="email" id="correo" name="correo" placeholder=" Email" class="form-control" required data-validation="required email" value="{{ $usuario->correo}}">
                        <small class="help-block form-text">Ingrese su correo</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="password-input" class=" form-control-label">Clave</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="password" id="clave" name="clave" placeholder="Password" class="form-control" value="">
                        <small class="help-block form-text">Ingrese su Nueva Contraseña</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Tipo de Documento</label>
                    </div>

                    <div class="col-12 col-md-9">
                        <select name="tipo_documento" id="tipo_documento" class="form-control" required data-validation="required" data-validation="required" selected="{{ $usuario->id_tipo_documento}}">
                            <option value="">Seleccionar</option>
                            @foreach($tipos as $llaveTipos)
                              <option value="{{ $llaveTipos->id_tipo_documento }}">{{ $llaveTipos->tipo }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="documento" class=" form-control-label">Documento</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="documento" name="documento" placeholder=" Documento" class="form-control" value="{{ $usuario->documento}}">
                        <small class="help-block form-text">Ingrese su Documento</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">Roles</label>
                    </div>
                    <div class="col col-md-9">
                        <div class="form-check">
                          @foreach($roles as $llaveRoles)
                          <div class="checkbox">
                            <label for="inline-checkbox1" class="form-check-label">
                                <input type="checkbox" id="roles{{ $llaveRoles->id_rol }}" name="id_roles{{ $llaveRoles->id_rol }}" value="{{ $llaveRoles->id_rol }}" class="form-check-input">{{ $llaveRoles->nombre_rol }}
                            </label>
                          </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">Áreas de Formación</label>
                    </div>
                    <div class="col col-md-9">
                        <div class="form-check">
                          @foreach($areas_formacion as $llaveAreas)
                          <div class="checkbox">
                            <label for="inline-checkbox1" class="form-check-label">
                                <input type="checkbox" id="areas_formacion{{ $llaveAreas->id_area }}" name="id_area{{ $llaveAreas->id_area }}" value="{{ $llaveAreas->id_area }}" class="form-check-input">{{ $llaveAreas->nombre_area }}
                            </label>
                          </div>
                            @endforeach
                        </div>
                    </div>
                </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Actualizar
            </button>
            <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Reset
            </button>
        </div>
    </div>
  </form>
</div>
@endsection
@section('jsfoot')
<script type="text/javascript">
    $('#btnActualizarUsuario').addClass('active');
    $('#btnGestionApp').addClass('active');
    //
   $.validate({
        lang: 'es'
    });
   var usuarioRoles = JSON.parse("{{ $rolesUsuario}}");
   for(var i=0; i < usuarioRoles.length; i++)
   {
    $('#roles'+ usuarioRoles[i]).prop("checked", true );
   }
   var usuarioArea = JSON.parse("{{ $areas_formacionUsuario}}");
   for(var i=0; i < usuarioArea.length; i++)
   {
    $('#areas_formacion'+ usuarioArea[i]).prop("checked", true );
   }
   $("#tipo_documento option[value='{{$usuario->id_tipo_documento}}']").attr("selected", true);
   
</script>
@endsection
