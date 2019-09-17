@extends('layout/admin')

@section('titulo')
Buscar Producto - SENA
@endsection

@section('titulo_pagina')
Buscar Producto - SENA
@endsection

@section('cuerpo')

<div class="col-lg-12">
    <div class="card">
      @if(session('status'))
        <div class="alert alert-success">
          <strong>Producto Creado</strong>
        </div>
      @endif
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="card-header">
            <strong>Datos Básicos</strong>
        </div>
        <div class="card-body card-block">
              {{ CSRF_FIELD() }}

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Nombre Completo</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                        <small class="form-text text-muted">Nombre Completo de Producto</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email-input" class=" form-control-label">Detalles de Producto</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="detalles_producto" id="detalles_producto" class="form-control" required>
                        <small class="help-block form-text">Detalles</small>
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
                        <input type="text"  name="codigos_unspcs_id_codigo_unspcs" id="codigos_unspcs_id_codigo_unspcs" class="form-control" readonly>
                    </div>
                    <div class="col-12 col-md-4">
                        <input type="text"  name="nombre_c" id="nombre_c" class="form-control" readonly>
                    </div>
                    <div class="col-12 col-md-2">
                      <button class="item" data-toggle="tooltip" data-placement="top" title="Buscar Código" type="button" id="botonBuscar">
                          <i class="fa fa-search-plus"></i>
                      </button>
                    </div>
                </div>

        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-primary btn-sm" id="botonBuscarProducto">
                <i class="fa fa-dot-circle-o"></i> Buscar Producto
            </button>
            <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Reset
            </button>

        </div>
    </div>
  </form>

</div>

</div>
<div class="row">
  <div class="table-responsive m-b-40">
      <table class="table table-borderless table-data3" id="Productos">
          <thead>
              <tr>

                  <th>id</th>
                  <th>Nombre Completo</th>
                  <th>Detalles de Producto</th>
                  <th>Precio Unitario</th>
                  <th>Unidad de Medida</th>
                  <th>Foto</th>
              </tr>
          </thead>
          <tbody id="cuerpoTabla">

          </tbody>
      </table>
  </div>
</div>

@endsection

@section('jsfoot')
    <script src="js/select2.js"></script>
    <script>

        $(document).ready(function() {
           $("#id_area").select2();
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

         //****************
         $("#botonBuscarProducto").click(function(){
          var idCodigo = document.getElementById('codigos_unspcs_id_codigo_unspcs').value;
          var id_areaB = document.getElementById('id_area').value;
          var nombreB = document.getElementById('nombre').value;
          var detalles_productoB = document.getElementById('detalles_producto').value;
          var precio_unitarioB = "";
          var unidad_medidaB = "";

         $.post('{{ Route("buscandoProducto")}}', {_token: '{{ CSRF_token() }}',
         id_codigo_unspcs: idCodigo, id_area: id_areaB,
         nombre: nombreB, detalles_producto:detalles_productoB, precio_unitario:precio_unitarioB,
          unidad_medida: unidad_medidaB},function( datosI )
         {
         
          if(datosI === '[]')
          {
            alert("No Coincidencias" + datosI)
          }
          data = JSON.parse(datosI);
          var table = document.getElementById("Productos");
          var fila = table.rows.length;
          for(i=1; i< fila; i++)
          {
              table.deleteRow(1);
          }
          //
          for(i2 = 0; i2 < data.length; i2++)
          {
              var row = table.insertRow(i2+1);
              row.className = "fondot";
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);
              var cell4 = row.insertCell(3);
              var cell5 = row.insertCell(4);
              var cell6 = row.insertCell(5);

              cell1.innerHTML = data[i2].id_codigo_producto;
              cell2.innerHTML = data[i2].nombre;
              cell3.innerHTML = data[i2].detalles_producto;
              cell4.innerHTML = data[i2].precio_unitario;
              cell5.innerHTML = data[i2].unidad_medida;
              cell6.setAttribute("id", parseInt(data[i2].id_codigo_producto));
              var acc;
              dataImg = (data[i2].foto);
              
              if(dataImg != null)
              {
                acc = "<img src='data:image/jpeg;base64," + dataImg + "' width='50px' onclick='javascript:this.height=200;this.width=200' ondblclick='javascript:this.width=50;this.height=50' data-toggle='tooltip' data-placement='top' title='Ver Foto'>"
              }
              else
              {
                acc = "<span>Sin Foto</span>";
              }
              
              
              if( '{{ $edicion }}' == 'Si' )
              {
                acc += "<button class='btn btn-primary btn-sm' name= '" + data[i2].id_codigo_producto + "' onclick='edit(this)'>Editar</button>";
              }
              cell6.innerHTML = acc;
              //var image = new Image();
              //image.src = 'data:image/jpeg;base64,' + data[i2].foto;
              //document.getElementById(4).appendChild(image);
          }

         });
       });
         //****************

         });
        function edit(x)
        {
          window.location.assign("{{ Route('modificarProducto')}}/" + x.name);
        }
         function asignar(valor)
         {
           cadena = valor.name;
           dato = cadena.split('@');

           document.getElementById('nombre_c').value = dato.pop();
           document.getElementById('codigos_unspcs_id_codigo_unspcs').value = dato;
           $("#buscarC").modal("hide");
         }
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
