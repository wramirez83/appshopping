@extends('layout/admin')

@section('titulo')
Ficha - SENA
@endsection

@section('titulo_pagina')
Ficha - SENA
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
          <strong>Ficha Creada</strong>
        </div>
      @endif
        <form action="{{ Route('guardarFicha') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="card-header">
            <strong>Datos Básicos</strong>
        </div>
        <div class="card-body card-block">
              {{ CSRF_FIELD() }}

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Número Ficha</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="ficha" class="form-control" data-validation="required">
                        <small class="form-text text-muted">Número de Ficha</small>
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Proyecto de Formación</label>
                    </div>

                    <div class="col-12 col-md-9">
                        <select name="id_proyecto_formativo" id="id_proyecto_formativo" class="form-control" required data-validation="required">
                            <option value="">Seleccionar</option>
                            @foreach($proyecto as $llaveProyecto)
                            <option value="{{ $llaveProyecto->id_proyecto_formativo }}">Código: {{ $llaveProyecto->codigo }} - {{ $llaveProyecto->nombre_proyecto }}</option>
                            @endforeach
                        </select>
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
                <th>Ficha</th>
                <th>Proyecto</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($fichas as $llaveFichas)
            <tr class="spacer"></tr>
            <tr class="spacer"></tr>
            <tr class="tr-shadow">
                <td>
                    <label class="au-checkbox">
                        <input type="checkbox">
                        <span class="au-checkmark"></span>
                    </label>
                </td>
                <td>{{ $llaveFichas->id_ficha }}</td>
                <td id="nombre{{ $llaveFichas->id_ficha }}">
                    {{ $llaveFichas->ficha }}
                </td>
                <td class="desc">
                     <a href="/verProyectoPdf/{{ $llaveFichas->id_proyecto_formativo }}" target="_blank">
                        Ver 
                        <i class="fa fa-file-pdf-o"></i></a>
                    </td>
                <td>{{ $llaveFichas->estado }}</td>

                <td>
                    <div class="table-data-feature">
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit" name="{{$llaveFichas->id_ficha }}" onclick="verModal(this)">
                            <i class="zmdi zmdi-edit"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $fichas->links() }}
</div>

@endsection

@section('jsfoot')
    <script src="js/select2.js"></script>
    <script>
        $(document).ready(function() { $("#id_proyecto_formativo").select2(); });

    $('#btnFicha').addClass('active');
    $('#btnGestionApp').addClass('active');

    $.validate({
        lang: 'es'
    });
</script>

@endsection
