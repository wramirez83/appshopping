@extends('layout/admin')

@section('titulo')
Listar Programa de Formación
@endsection

@section('titulo_pagina')
Listar Programa de Formación
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
                <th>Nombre Programa</th>
                <th>Codigo</th>
                <th>Version</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($programas as $llavePrograma)
            <tr class="spacer"></tr>
            <tr class="spacer"></tr>
            <tr class="tr-shadow">
                <td>
                    <label class="au-checkbox">
                        <input type="checkbox">
                        <span class="au-checkmark"></span>
                    </label>
                </td>
                <td>{{ $llavePrograma->id_programa }}</td>
                <td id="nombre{{ $llavePrograma->id_programa }}">
                    {{ $llavePrograma->nombre_programa }}
                </td>
                <td class="desc" id="codigo{{ $llavePrograma->id_programa }}">{{ $llavePrograma->codigo }}</td>
                <td id="version{{ $llavePrograma->id_programa }}">{{ $llavePrograma->version }}</td>
                <td id="estado{{ $llavePrograma->id_programa }}">{{ $llavePrograma->estado }}</td>

                <td>
                    <div class="table-data-feature">
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit" name="{{ $llavePrograma->id_programa }}" onclick="verModal(this)">
                            <i class="zmdi zmdi-edit"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript">
function verModal(a)
{
  $('#mediumModal').modal("toggle");
  var id = a.name;
  document.getElementById('nombre_programa').value = document.getElementById('nombre' + id).innerHTML;
  document.getElementById('codigo').value = document.getElementById('codigo' + id).innerHTML;
  document.getElementById('version').value = document.getElementById('version' + id).innerHTML;
  document.getElementById('id_programa').value = id;
}
</script>

@endsection
@section('jsfoot')
<script type="text/javascript">
   $('#btnListarPrograma').addClass('active');
    $('#btnGestionApp').addClass('active');
    //
   $.validate({
        lang: 'es'
    });
</script>
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="false" data-backdrop="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mediumModalLabel">Editar Programa de Formación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="{{ Route('modificarPrograma') }}" method="post">
          {{ CSRF_FIELD() }}
          <input type="text" id="id_programa" name="id_programa"/>
          <div class="row form-group">
              <div class="col col-md-3">
                  <label for="text-input" class=" form-control-label">Nombre del Programa</label>
              </div>
              <div class="col-12 col-md-9">
                  <input type="text" id="nombre_programa" name="nombre_programa"  class="form-control">
                  <small class="form-text text-muted">Nombre del Programa</small>
              </div>
          </div>
          <div class="row form-group">
              <div class="col col-md-3">
                  <label for="text-input" class=" form-control-label">Código</label>
              </div>
              <div class="col-12 col-md-9">
                  <input type="number" id="codigo" name="codigo"  class="form-control">
                  <small class="form-text text-muted">Ingresar Código</small>
              </div>
          </div>
          <div class="row form-group">
              <div class="col col-md-3">
                  <label for="text-input" class=" form-control-label">Versión</label>
              </div>
              <div class="col-12 col-md-9">
                  <input type="number" id="version" name="version"  class="form-control">
                  <small class="form-text text-muted">Ingresar Versión</small>
              </div>
          </div>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
@endsection
