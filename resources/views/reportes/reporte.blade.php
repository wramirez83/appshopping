@extends('layout/admin')

@section('titulo')
Reportes - SENA
@endsection

@section('titulo_pagina')
Reportes - SENA
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
      <strong></strong>
    </div>
    @endif

    <div class="col-lg-12 row">
     <div class="col-md-6 col-sm-12">
       <div class="card">
        <div class="card-head">
          Consolidado de Elementos Aprobados
        </div>
         <div class="card-body">
        
           <div class="col-sm-12">
             <form method="post" action="{{ Route('desargarReporteAprobado')}}" target="_new">
            {{ CSRF_FIELD()}}
            <label for="vigencia">
              Vigencia
            </label>
            <input type="number" id="vigencia" class="form-control" name="vigencia" value="<?php echo date('Y')?>" required>
            <input type="submit" class="btn btn-primary col-12" name="" value="Guardar">
          </form>
           </div>

          
        </div>
      </div>
    </div>

     <div class="col-md-6 col-sm-12">
      <div class="card">
        <div class="card-head">
          Solicitudes Aprobadas
        </div>
        <div class="card-body">
          <form method="post" action="{{ Route('solicitudesAprobadas') }}" target="_new">
            {{ CSRF_FIELD()}}
            <label for="vigenciaSolicitud">
              Vigencia
            </label>
            <input type="number" id="vigenciaSolicitud" class="form-control" name="vigenciaSolicitud" value="<?php echo date('Y')?>" required>
          <input type="submit" class="btn btn-primary col-12" name="" value="Guardar">
          </form>
        </div>
      </div>
     </div>
</div>


@endsection