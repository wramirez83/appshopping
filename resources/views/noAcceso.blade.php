@extends('layout/admin')

@section('titulo')
Sin Acceso
@endsection

@section('titulo_pagina')
Sin Acceso
@endsection

@section('cuerpo')
<div class="col-lg-12">
    <div class="card">
     
        <div class="alert alert-danger">
          
           No tiene Permiso para Acceder al módulo seleccionado.
         
        </div>
    </div>
</div>
@endsection
