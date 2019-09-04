@extends('layout/admin')

@section('titulo')
Proyecto Formativo - SENA
@endsection

@section('titulo_pagina')
Proyecto Formativo - SENA
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
      <strong>Proyecto Creado</strong>
    </div>
    @endif
    <form action="{{ Route('guardarProyecto') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
      <div class="card-header">
        <strong>Datos Básicos</strong>
      </div>
      <div class="card-body card-block">
        {{ CSRF_FIELD() }}

        <div class="row form-group">
          <div class="col col-md-3">
            <label for="text-input" class=" form-control-label">Nombre Completo</label>
          </div>
          <div class="col-12 col-md-9">
            <input type="text" id="text-input" name="nombre_proyecto" placeholder="" class="form-control" value="{{ old('nombre_proyecto') }}" required data-validation="required">
            <small class="form-text text-muted">Nombre Completo de Proyecto</small>
          </div>
        </div>
        <div class="row form-group">
          <div class="col col-md-3">
            <label for="email-input" class=" form-control-label">Código</label>
          </div>
          <div class="col-12 col-md-9">
            <input type="number" id="email-input" name="codigo" class="form-control" value="{{ old('codigo') }}" required data-validation="required">
            <small class="help-block form-text">Ingrese Código</small>
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3">
            <label for="select" class=" form-control-label">Programa de Formación</label>
          </div>

          <div class="col-12 col-md-9">
            <select name="id_programa" id="id_programa" class="form-control" required data-validation='required'>
              <option value="">Seleccionar</option>
              @foreach($programas as $llaveProgramas)
              <option value="{{ $llaveProgramas->id_programa }}">{{ $llaveProgramas->nombre_programa }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="row form-group">
          <div class="col col-md-3">
            <label for="file-input" class=" form-control-label">Subir Proyecto Formativo para titulada (*.pdf) o Planeacion para Complementaria (*.pdf)</label>
          </div>
          <div class="col-12 col-md-9">
            <input type="file" id="pdf_proyecto" name="pdf_proyecto" class="form-control-file" data-validation="size" data-validation-max-size="5M">
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
<script src="js/select2.js"></script>
<script>
$(document).ready(function() { $("#id_programa").select2(); });
</script>

<script type="text/javascript">
   $('#btnProyecto').addClass('active');
    $('#btnGestionApp').addClass('active');
    //
   $.validate({
        lang: 'es',
         modules : 'file'
    });
</script>
@endsection
