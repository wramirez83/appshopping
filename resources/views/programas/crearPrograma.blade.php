@extends('layout/admin')

@section('titulo')
Crear Programa de Formacion - SENA
@endsection

@section('titulo_pagina')
Crear Programa de Formacion
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
        <div class="alert alert-success">
          <strong>Programa de Formación Creado</strong>
        </div>
      @endif
        <form action="{{ Route('guardarProgramaFormacion') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="card-header">
            <strong>Datos de Programa</strong>
        </div>
        <div class="card-body card-block">
              {{ CSRF_FIELD() }}

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Nombre del Programa</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="nombre_programa"  class="form-control" value="{{ old('nombre_programa')}}" required data-validation="required">
                        <small class="form-text text-muted">Nombre del Programa</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Código</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="text-input" name="codigo"  class="form-control" value="{{ old('codigo')}}" required required data-validation="required">
                        <small class="form-text text-muted">Ingresar Código</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Versión</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="text-input" name="version"  class="form-control" value="{{ old('version')}}" required required data-validation="required">
                        <small class="form-text text-muted">Ingresar Versión</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Nivel</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="nivel" required required data-validation="required">
                            <option value="Titualada">Titualada</option>
                            <option value="Complementara">Complementara</option>
                        </select>
                        <small class="form-text text-muted">Seleccione Nivel</small>
                    </div>
                </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Guardar
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
    $('#btnProgramaFormacion').addClass('active');
    $('#btnGestionApp').addClass('active');
    //
   $.validate({
        lang: 'es'
    });
</script>
@endsection