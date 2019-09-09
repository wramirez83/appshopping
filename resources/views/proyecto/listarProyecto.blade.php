@extends('layout/admin')

@section('titulo')
Listar Proyecto Formativo - SENA
@endsection

@section('titulo_pagina')
Listar Proyecto Formativo - SENA
@endsection

@section('cuerpo')
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
                <th>Nombre Proyecto</th>
                <th>Codigo</th>
                <th>Programa</th>
                <th>Ver PDF</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($proyectos as $llaveProyectos)
            <tr class="spacer"></tr>
            <tr class="spacer"></tr>
            <tr class="tr-shadow">
                <td>
                    <label class="au-checkbox">
                        <input type="checkbox">
                        <span class="au-checkmark"></span>
                    </label>
                </td>
                <td>{{ $llaveProyectos->id_proyecto_formativo }}</td>
                <td id="nombre{{ $llaveProyectos->id_proyecto_formativo }}">
                    {{ $llaveProyectos->nombre_proyecto }}
                </td>
                <td class="desc">{{ $llaveProyectos->codigo }}</td>
                <td>{{ $llaveProyectos->id_programa }}</td>
                <td><a href="{{ '/verProyectoPdf/' . $llaveProyectos->id_proyecto_formativo }}" target="_blank"><i class="fa fa-file-pdf"></i></a></td>

                <td>
                    <div class="table-data-feature">
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit" name="{{ $llaveProyectos->id_proyecto_formativo }}" onclick="verModal(this)">
                            <i class="zmdi zmdi-edit"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {{ $proyectos->links() }}
    </div>
</div>
@endsection
@section('jsfoot')
<script type="text/javascript">
     $('#btnListarProyecto').addClass('active');
    $('#btnGestionApp').addClass('active');
</script>
@endsection
