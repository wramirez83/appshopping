@extends('layout/admin')

@section('titulo')
Aprobar Codigo UNSPSC
@endsection

@section('titulo_pagina')
Aprobar Codigo UNSPSC
@endsection

@section('cuerpo')




<div class="table-responsive table-responsive-data2">
    <table class="table table-data2">
        <thead>
            <tr>

                <th>Código</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Aprobar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($codigos as $llaveDatos)
            <tr class="spacer"></tr>
            <tr class="spacer"></tr>
            <tr class="tr-shadow">

                <td id="id{{ $llaveDatos->id_codigo_unspcs }}">
                    {{ $llaveDatos->id_codigo_unspcs }}
                </td>
                <td class="desc">{{ $llaveDatos->descripcion }}</td>
                <td>Pendente</td>
                <td>
                  <form class="" action="{{ Route('aprobarCodigoUNSPSC') }}" method="post">
                    {{ CSRF_FIELD() }}
                    <input type="hidden" name="id_codigo_unspcs" value="{{ $llaveDatos->id_codigo_unspcs }}"/>
                    <div class="table-data-feature">
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Aprobar" type="submit">
                            <i class="zmdi zmdi-edit"></i>
                        </button>
                    </div>
                  </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
