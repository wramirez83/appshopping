@extends('layout/admin')

@section('titulo')
Buscar Codigo UNSPSC
@endsection

@section('titulo_pagina')
Buscar Codigo UNSPSC
@endsection

@section('cuerpo')
<div class="col-lg-12">
    <div class="card">

        <form action="{{ Route('buscandoCodigoUNSPSC') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="card-header">
            <strong>Datos Básicos</strong>
        </div>
        <div class="card-body card-block">
              {{ CSRF_FIELD() }}

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Código</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="text-input" name="id_codigo_unspcs" class="form-control">
                        <small class="form-text text-muted">Ingresar Código</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Descripción</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="descripcion" class="form-control">
                        <small class="form-text text-muted">Ingresar Descripción</small>
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

<div class="table-responsive table-responsive-data2">
    <table class="table table-data2">
        <thead>
            <tr>

                <th>Código</th>
                <th>Descripción</th>

            </tr>
        </thead>
        <tbody>
            @foreach(session('datos') as $llaveDatos)
            <tr class="spacer"></tr>
            <tr class="spacer"></tr>
            <tr class="tr-shadow">

                <td id="id{{ $llaveDatos->id_codigo_unspcs }}">
                    {{ $llaveDatos->id_codigo_unspcs }}
                </td>
                <td class="desc">{{ $llaveDatos->descripcion }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection
