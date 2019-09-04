@extends('layout/admin')

@section('titulo')
Solicitud Guardada para Modificar - SENA
@endsection

@section('titulo_pagina')
Solicitud Guardada para Modificar - SENA
@endsection

@section('cuerpo')
<?php $role = array_column(json_decode($_COOKIE['roles']), 'id')?>
<div class="col-lg-12">
  <div class="card">
    @if(session('status'))
    <div class="alert alert-success">
      <strong>Solicitud ha Sido Guardada</strong>
    </div>
    @endif
    <div class="card">
      <div class="card-header">
        <strong class="card-title mb-3">Identificador Nº:</strong> {{ $solicitud->id_solicitud }} | 
        <h5><a href="/verProyectoPdf/{{ $solicitud->id_solicitud }}" target="_blank">Ver Proyecto Formativo<i class="fa fa-file-pdf-o"></i></a></h5>
      </div>
      <div class="card-body">
        <div class="mx-auto d-block">
          <h5 class="text-sm-center mt-2 mb-1">Fecha de Solicitud: {{ $solicitud->fecha }}</h5>
          <div class="col-sm-6 col-md-6 center">
            <h2 class="pb-2 display-5">
              $<span id="totalPedido" class="number">0</span>
            </h2>
          </div>
        </div>
        <hr>
        <div class="card-text text-sm-center">
          <div class="table-responsive table--no-card m-b-30">
            <strong>Productos Existentes</strong>
            <table class="table table-borderless table-striped table-earning">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Producto</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th>Total</th>
                 
                </tr>
              </thead>
              <tbody>
                <?php $t = 0?>

                <form class="" action="index.html" method="post">
                  @foreach($productos as $llaveProductos)
                  <tr class="typo-articles">
                    <td>{{ $llaveProductos->id_productos_solicitudes }}</td>
                    <td>{{ $llaveProductos->nombre }}</td>
                    <td>{{ number_format($llaveProductos->precio) }}</td>
                    <td>{{ $llaveProductos->cantidad }}</td>
                    <td><?php $t = $t + ($llaveProductos->cantidad * $llaveProductos->precio) ?>
                      {{ number_format($llaveProductos->cantidad * $llaveProductos->precio)}}
                    </td>
                  </tr>
                  @endforeach
                </form>

                <tr>
                  <td colspan="6">

              @if((in_array(1, $role) || in_array(3, $role) || in_array(4, $role) || in_array(5, $role) || in_array(6, $role)) && ($solicitud->id_estado > 1 && $solicitud->id_estado <= 6))
              <hr>




              @if($solicitud->id_estado < max($role))
              <div class="card border border-primary">
                <a href="#" onclick="solicitarAprobacion('{{ $solicitud->id_solicitud }}')" class="text-center">
                  <i class="fa fa-check"></i><h6>Aprobar</h6>
                </a>
              </div>
                <div class="card border border-primary">
                  <a href="#" onclick="solicitarNoAprobacion('{{ $solicitud->id_solicitud }}')" class="text-center">
                    <i class="fa fa-times-circle"></i><h6>No Aprobar</h6>
                  </a>
                </div>
                @endif


              @endif</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>



      </div>
    </div>
  </div>
  @endsection

  @section('jsfoot')
  <script src="js/select2.js"></script>

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
  <script type="text/javascript">
  $(document).ready(function()
  {
    totalPedido.innerHTML = '<?php echo number_format($t)?>'
    $("#id_area").select2();
    $("#botonBuscarProducto").click(function(){
      var idCodigo = "";
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
          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
          var cell3 = row.insertCell(2);
          var cell4 = row.insertCell(3);
          var cell5 = row.insertCell(4);
          var cell6 = row.insertCell(5);
          var cell7 = row.insertCell(6);
          var cell8 = row.insertCell(7);

          cell1.setAttribute("id", "idP" + i2,0);
          cell1.setAttribute("style", "display:none",0);
          cell2.setAttribute("id", "nombreP" + i2,0);
          cell3.setAttribute("id", "detalleP" + i2,0);
          cell4.setAttribute("id", "precioP" + i2,0);
          cell5.setAttribute("id", "unidadP" + i2,0);
          cell6.setAttribute("id", "cantidadP" + i2,0);

          cell1.innerHTML = data[i2].id_codigo_producto;
          cell2.innerHTML = data[i2].nombre;
          cell3.innerHTML = data[i2].detalles_producto;
          cell4.innerHTML = data[i2].precio_unitario;
          cell5.innerHTML = data[i2].unidad_medida;
          cell6.innerHTML = '<input type="number" name="cantidad" id="cantidad' + i2 + '" class="form-control" value="1" min="1">';
          cell7.innerHTML = '<textarea rows="3" cols="50" id="observaciones' + i2 + '" class="form-control">';
          cell8.innerHTML = '<button onclick="asignarProducto(this)" name="' + i2 + '"><i class="fas fa-bolt" type="button"></i></button'

        }

      });
    });



  });


  </script>
  @endsection
