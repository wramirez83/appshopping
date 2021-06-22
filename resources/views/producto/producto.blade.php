@extends('layout/admin')

@section('titulo')
Crear Ficha Técnica - SENA
@endsection

@section('titulo_pagina')
Crear Ficha Técnica - SENA
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
          <strong>Ficha Técnica Creada</strong>
        </div>
      @endif
        <form action="{{ Route('guardarProducto') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="card-header">
            <strong>Datos Básicos.</strong>
        </div>
        <div class="card-body card-block">
              {{ CSRF_FIELD() }}
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Nombre Completo</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="nombre" class="form-control" required value="{{old('nombre')}}" data-validation="required">
                        <small class="form-text text-muted">Nombre Completo de Producto</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email-input" class=" form-control-label">Detalles de Producto</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="detalles_producto" id="detalles_producto" rows="15" cols="80" class="form-control" data-validation="required">
                          @if(old('detalles_producto') != "")
                              {{old('detalles_producto')}}
                          @endif</textarea>
                        <small class="help-block form-text">Detalles</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email-input" class=" form-control-label">Precio Unitario</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="precio_unitario" name="precio_unitario" class="form-control" required value="{{old('precio_unitario')}}" data-validation="required number">
                        <small class="help-block form-text">Precio</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email-input" class=" form-control-label">Unidad de Medida</label>
                    </div>
                    <div class="col-12 col-md-9">
                        
                        
                        <select name="unidad_medida" id="unidad_medida" required>
                          <option value="">Seleccionar</option>
                          @foreach($unidades_medida as $llaveUnidad)
                            <option value="{{ $llaveUnidad->unidad_medida }}">{{ $llaveUnidad->unidad_medida }} - {{ $llaveUnidad->descripcion }}</option>
                          @endforeach
                        </select>
                        <small class="help-block form-text">Unidad de Medida</small>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Área</label>
                    </div>

                    <div class="col-12 col-md-9">
                        <select name="id_area" id="id_area" class="form-control" required>
                            <option value="">Seleccionar</option>
                            @foreach($area as $llaveArea)
                            <option value="{{ $llaveArea->id_area }}">{{ $llaveArea->nombre_area }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="" class=" form-control-label">Código UNSPCS</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text"  name="codigos_unspcs_id_codigo_unspcs" id="codigos_unspcs_id_codigo_unspcs" class="form-control" readonly value="{{old('codigos_unspcs_id_codigo_unspcs')}}" required>
                    </div>
                    <div class="col-12 col-md-4">
                        <input type="text"  name="nombre_c" id="nombre_c" class="form-control" readonly value="{{old('nombre_c')}}" required>
                    </div>
                    <div class="col-12 col-md-2">
                      <button class="item" data-toggle="tooltip" data-placement="top" title="Buscar Código" type="button" id="botonBuscar">
                          <i class="fa fa-search-plus"></i>
                      </button>
                    </div>
                </div>
                <div class="row form-group">
                  <div class="col col-md-3">
                    <label for="file-input" class=" form-control-label">Subir Foto (*Opcional)</label>
                  </div>
                  <div class="col-12 col-md-9">
                    <input type="file" id="foto" name="foto" class="form-control-file">
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

</div>


@endsection

@section('jsfoot')
    <script src="js/select2.js"></script>
        
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script>

        $(document).ready(function() {
          $('#btnNuevoProducto').addClass('active');
           $("#id_area").select2();
           $("#unidad_medida").select2();
          //*************TINYMCE*********
            tinymce.init({
            selector: '#detalles_producto',
            theme:'silver',
            language: 'es',
            plugins: "lists",
            menubar: false,
            toolbar:[ 'newdocument | bold | numlist | bullist | paste |italic | underline | alignleft | alignjustify | aligncenter alignright undo redo subscript superscript ',
        'code' 
            ],
            });
          //*****************************
           $("#botonBuscar").click(function(){
             $("#buscarC").modal({backdrop: true});
           });
           @if(session('datos'))

           $("#buscarC").modal({backdrop: true});

           @endif
           $("#botonBuscarC").click(function(){
            var id = document.getElementById('id_codigo_unspcsb').value;
            var des = document.getElementById('descripcionb').value;
           $.post('{{ Route("consultarJS")}}', {_token: '{{ CSRF_token() }}', id_codigo_unspcs: id, descripcion: des},function( datosI )
           {
            data = JSON.parse(datosI);
            var table = document.getElementById("codigosBuscados");
            var fila = table.rows.length;
            for(i=1; i< fila; i++)
            {
                table.deleteRow(1);
            }
            //tablaVisitaPuerta
            for(i2 = 0; i2 < data.length; i2++)
            {
                var row = table.insertRow(i2+1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);

                cell1.innerHTML = data[i2].id_codigo_unspcs;
                cell2.innerHTML = data[i2].descripcion;
                cell3.innerHTML = '<button class="item" data-toggle="tooltip" data-placement="top" title="Edit" onclick="asignar(this)" name=" ' + data[i2].id_codigo_unspcs + '@' + data[i2].descripcion + '"><i class="fa fa-bolt"></i></button>';
            }

           });
         });

         });
         function asignar(valor)
         {
           cadena = valor.name;
           dato = cadena.split('@');

           document.getElementById('nombre_c').value = dato.pop();
           document.getElementById('codigos_unspcs_id_codigo_unspcs').value = dato;
           $("#buscarC").modal("hide");
         }

         $('#btnProducto').addClass('active');
        $('#btnGestionApp').addClass('active');

    $.validate({
        lang: 'es'
    });
  </script>





  <div class="modal fade" id="buscarC"   tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-lg" role="document" style="z-index:1041">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="largeModalLabel">Buscar Código UNSPCS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            <form action="{{ Route('buscandoCodigoUNSPSC') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="card-header">
                <strong>Datos Básicos</strong>
            </div>
            <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Código</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" id="id_codigo_unspcsb" name="id_codigo_unspcs" class="form-control">
                            <small class="form-text text-muted">Ingresar Código</small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Descripción</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="descripcionb" name="descripcion" class="form-control">
                            <small class="form-text text-muted">Ingresar Descripción</small>
                        </div>
                    </div>

            </div>
            <div class="card-footer">
                <button class="btn btn-primary btn-sm" type="button" id="botonBuscarC">
                    <i class="fa fa-dot-circle-o"></i> Buscar
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>
      </form>



      <div class="table-responsive table-responsive-data2">
          <table class="table table-data2" id="codigosBuscados">
              <thead>
                  <tr>

                      <th>Código</th>
                      <th>Descripción</th>
                      <th>Asignar</th>

                  </tr>
              </thead>
              <tbody>

              </tbody>
          </table>
      </div>


          </p>
        </div>

      </div>
    </div>
@endsection
