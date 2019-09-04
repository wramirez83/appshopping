@extends('layout/admin')

@section('titulo')
Sectores Económicos - SENA
@endsection

@section('titulo_pagina')
Sectores Económicos
@endsection

@section('cuerpo')
<div class="col-lg-12">
    <div class="card">

      @if(session('status'))
        <div class="alert alert-success">
          <strong>Área Creada</strong>
        </div>
      @endif
      @if($errors->any())
        <div class="alert alert-danger">
          @foreach($errors->all() as $llaveError)
            {{ $llaveError }} <br/>
          @endforeach
        </div>
      @endif
        <form action="{{ Route('guardarArea') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="card-header">
            <strong>Filtros Básicos</strong>
        </div>
        <div class="card-body card-block">
              {{ CSRF_FIELD() }}

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Nombre del Sector Económico</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="nombre_area" class="form-control" required data-validation="required">
                        <small class="form-text text-muted">Nombre del Sector Económico</small>
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

@if(count($areas)> 0)

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
                <th>Nombre del Área</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>

            <tr class="spacer"></tr>

            <tr class="spacer"></tr>

            <tr class="spacer"></tr>
            @foreach($areas as $llaveRegistros)
            <tr class="tr-shadow">
                <td>
                    <label class="au-checkbox">
                        <input type="checkbox">
                        <span class="au-checkmark"></span>
                    </label>
                </td>
                <td>{{ $llaveRegistros->id_area }}</td>
                <td>
                    <span>{{ $llaveRegistros->nombre_area }}</span>
                </td>
                <td>
                    {{ $llaveRegistros->estado }}
                </td>
               
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endif


@endsection
@section('jsfoot')
<script type="text/javascript">
    $('#btnCrearSectorEconomico').addClass('active');
    $('#btnGestionApp').addClass('active');
    //
   $.validate({
        lang: 'es'
    });
</script>
@endsection