@extends('layout/admin')

@section('titulo')
Listar Solicitud - SENA
@endsection

@section('titulo_pagina')
Listar Solicitud - SENA
@endsection

@section('cuerpo')
<div class="col-lg-12">
  <div class="card">


<?php $role = array_column(json_decode($_COOKIE['roles']), 'id')?>
    <div class="table-responsive table--no-card m-b-30">
      <table class="table table-borderless table-striped table-earning">
        <thead>
          <tr>
            <th>Id - Proyecto</th>
            <th>Fecha</th>
            <th>Ficha</th>
            <th class="text-right">Estado</th>
            <th class="text-right">Acción</th>
          </tr>
        </thead>
        <tbody>
          @foreach($solicitudes as $llaveSolicitudes)
          <tr>
            <td>{{ $llaveSolicitudes->id_solicitud }} <a href="/verProyectoPdf/{{ $llaveSolicitudes->id_proyecto_formativo }}" target="_blank"><i class="fa fa-file-pdf-o"></i></a></td>
            <td>{{ $llaveSolicitudes->fecha }}</td>
            <td>{{ $llaveSolicitudes->ficha }}</td>
            <td class="text-right">{{ $llaveSolicitudes->nombre_estado }}</td>
            <td class="text-right">

              @if($llaveSolicitudes->id_estado == 1)
              <i class="fa fa-edit" onclick="ira({{ $llaveSolicitudes->id_solicitud }})"></i>
              @endif
              @if($llaveSolicitudes->id_estado > 1)
              <i class="fa fa-eye" onclick="ira({{ $llaveSolicitudes->id_solicitud }})"></i>
              @endif
              @if((in_array(1, $role) || in_array(3, $role) || in_array(4, $role) || in_array(5, $role) || in_array(6, $role)) && ($llaveSolicitudes->id_estado > 1 && $llaveSolicitudes->id_estado <= 6))
              <hr>
              @if(!isset($historial))
              <div class="card border border-primary">
                <a href="#" onclick="solicitarAprobacion('{{ $llaveSolicitudes->id_solicitud }}')" class="text-center">
                  <i class="fa fa-check"></i><h6>Aprobar</h6>
                </a>
              </div>
                <div class="card border border-primary">
                  <a href="#" onclick="solicitarNoAprobacion('{{ $llaveSolicitudes->id_solicitud }}')" class="text-center">
                    <i class="fa fa-times-circle"></i><h6>No Aprobar</h6>
                  </a>
                </div>
                @endif
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>

<form action="{{ Route('listaSolicitud') }}" method="post" id="formularioEditar" name="formularioEditar">
  {{ CSRF_FIELD() }}
  <input type="hidden" id="id_solicitud" name="id_solicitud" value="">
</form>

  @endsection

  @section('jsfoot')
  <script src="js/select2.js"></script>
  <script type="text/javascript">
    function ira(valor)
    {
      document.getElementById('id_solicitud').value = valor;
      document.formularioEditar.submit();
    }
  </script>
  @if((in_array(1, $role) || in_array(3, $role) || in_array(4, $role) || in_array(5, $role) || in_array(6, $role)))
  <script type="text/javascript">
    function solicitarAprobacion(id)
    {
      //Para enviar solicitud según nivel
      if(confirm('Desea Aprobar La Solicitud Número: ' + id))
      {
        location.href ="{{Route('solicitarAprobarSolicitud')}}" + "/" + id;
      }
    }
    function solicitarNoAprobacion(id)
    {
      //Para enviar solicitud según nivel
      if(confirm('Desea No Aprobar La Solicitud Número: ' + id))
      {
        location.href ="{{Route('solicitarNoAprobarSolicitud')}}" + "/" + id;
      }
    }
  </script>
  @endif

  @endsection
