@extends('layout/admin')

@section('titulo')
Crear Solicitud - SENA
@endsection

@section('titulo_pagina')
Crear Solicitud - SENA
@endsection

@section('cuerpo')
<div class="col-lg-12">
  <div class="card">
    @if(session('status'))
    <div class="alert alert-success">
      <strong>Solicitud ha Sido Guardada</strong>
      <br>
      <strong>{{ session('status') }}</strong>
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
            <label for="select" class=" form-control-label">Ficha para Solicitud</label>
          </div>
          <div class="col-12 col-md-9">
            <select name="id_ficha" id="id_ficha" class="form-control" required>
              <option value="">Seleccionar</option>
              @foreach($ficha as $llaveFicha)
              <option value="{{ $llaveFicha->id_ficha}}">{{ $llaveFicha->ficha}}</option>
              @endforeach
            </select>
          </div>
          <div class="col col-md-3">
            <label for="select" class=" form-control-label">Área de Formación</label>
          </div>
          <div class="col-12 col-md-9">
            <select name="id_area_formacion" id="id_area_formacion" class="form-control" required>
              @foreach($area_formacion as $llaveA)
              <option value="{{ $llaveA->id_area}}">{{ $llaveA->nombre_area}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-6">
            <button class="au-btn au-btn-icon au-btn--blue" type="button" data-target="#buscarP" data-toggle="modal">
              <i class="zmdi zmdi-plus"></i>
              Add Producto
            </button>
          </div>
          <div class="col-sm-6 col-md-6 center">
            <h2 class="pb-2 display-5">
              $<span id="totalPedido">0</span>
            </h2>
          </div>
        </div>

        <div class="table-responsive table--no-card m-b-30">
        <div class="table-responsive table-responsive-data2">
          <table class="table table-data2" id="productosSel">
            <thead>
              <tr>
                <th>id</th>
                <th>Nombre Completo</th>
                <th>Detalles de Producto</th>
                <th>Precio Unitario</th>
                <th>Unidad de Medida</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>

      </div>
      <div class="card-footer">
        <button type="button" class="btn btn-primary btn-sm" id="guardar">
          <i class="fa fa-dot-circle-o"></i>
          Guardar
        </button>
        <button type="button" class="btn btn-success btn-sm" id="guardarEnviar">
          <i class="fa fa-dot-circle-o"></i>
          <i class="fa fa-share"></i>
           Guardar y Enviar
        </button>
      </div>
    </div>
  </form>

</div>



@endsection

@section('jsfoot')
<script src="js/select2.js"></script>
<script>
$(document).ready(function()
{
  $("#id_ficha").select2();
  $("#id_area").select2();

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
        dataImg = (data[i2].foto);
        cell6.innerHTML = '<input type="number" name="cantidad" id="cantidad' + i2 + '" class="form-control" value="1" min="1">';
        cell7.innerHTML = '<button onclick="asignarProducto(this)" name="' + i2 + '" data-toggle="tooltip" data-placement="top" title="Asignar"><i class="fas fa-bolt"></i></button>' + " | <img src='data:image/jpeg;base64," + dataImg + "' width='50px' onclick='javascript:this.height=200;this.width=200' ondblclick='javascript:this.width=50;this.height=50' data-toggle='tooltip' data-placement='top' title='Ver Foto'>"

      }

    });
  });
  //****************
  $("#guardar").click(function(){
    if(confirm('Desea Guardar Formulario'))
    {
      enviarSolicitud();
    }
    else {

    }
  });
  $("#guardarEnviar").click(function(){
    if(confirm('Desea Guardar y Enviar Formulario'))
    {
      var inpt = document.createElement('input');
  		inpt.type="hidden";
  		inpt.name="id_estado";
  		inpt.id="id_estado";
      inpt.value = 2;
  		document.formularioJS.appendChild(inpt);
      enviarSolicitud();
    }
  });

});
function asignarProducto(valor)
{
  var nombreID = valor.name;
  var tablaP = document.getElementById("productosSel");
  var fila = tablaP.rows.length;
  var totalFila = parseFloat(document.getElementById('precioP' + nombreID).innerHTML) * parseFloat(document.getElementById('cantidad' + nombreID).value);
  var totalPedido = document.getElementById('totalPedido');
  var row = tablaP.insertRow(fila);
  //*****
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);
  var cell5 = row.insertCell(4);
  var cell6 = row.insertCell(5);//Cantidad
  var cell7 = row.insertCell(6);
  var cell8 = row.insertCell(7);

  cell1.setAttribute("id", "idPs" + fila,0);
  //cell1.setAttribute("style", "display:none",0);
  cell2.setAttribute("id", "nombrePs" + fila,0);
  cell3.setAttribute("id", "detallePs" + fila,0);
  cell4.setAttribute("id", "precioPs" + fila,0);
  cell5.setAttribute("id", "unidadPs" + fila,0);
  cell6.setAttribute("id", "cantidadPs" + fila,0);
  cell7.setAttribute("id", "totalPs" + fila,0);

  cell1.innerHTML = document.getElementById("idP" + nombreID).innerHTML;
  cell2.innerHTML = document.getElementById("nombreP" + nombreID).innerHTML;
  cell3.innerHTML = document.getElementById("detalleP" + nombreID).innerHTML;
  cell4.innerHTML = document.getElementById("precioP" + nombreID).innerHTML;
  cell5.innerHTML = document.getElementById("unidadP" + nombreID).innerHTML;
  cell6.innerHTML = document.getElementById("cantidad" + nombreID).value;
  cell7.innerHTML = totalFila;
  cell8.innerHTML = '<button onclick="eliminarProductoS(this)" name="' + fila + '"><i class="fas fa-trash-alt"></i></button>'
  totalPedido.innerHTML = parseFloat(totalPedido.innerHTML) + totalFila;

  //document.getElementById('verAccion').style.display = "block";
  alert('Ficha técnica agregada a la solicitud');

}
function eliminarProductoS(valor)
{
  if(confirm("Desea Eliminar Producto de la Lista"))
  {
    var nombreID = valor.name;
    var totalPedido = document.getElementById('totalPedido');
    totalPedido.innerHTML =   parseFloat(totalPedido.innerHTML) - parseFloat(document.getElementById("totalPs" + nombreID).innerHTML);
    var tablaP = document.getElementById("productosSel");
    tablaP.deleteRow(nombreID);

  }
}
function enviarSolicitud()
{
  if(parseFloat(document.getElementById('totalPedido').innerHTML) > 0 && document.getElementById('id_ficha').value != "")
  {
    var tablaP = document.getElementById("productosSel");
    var fila = tablaP.rows.length;

    var array = new Array();
    var arrayT = new Array();
    for (var i = 0; i < fila-1; i++)
    {
      var i2 = i +1;
      arrayT[0] = document.getElementById('idPs' + i2).innerHTML;
      arrayT[1] = document.getElementById('precioPs' + i2).innerHTML;
      arrayT[2] = document.getElementById('cantidadPs' + i2).innerHTML;
      array[i] = arrayT;
      var arrayT = new Array();
    }
    document.getElementById('id_ficha_JS').value = document.getElementById('id_ficha').value;
    document.getElementById('id_area_formacionJS').value = document.getElementById('id_area_formacion').value;
    document.getElementById('productosJS').value = JSON.stringify(array);
    document.formularioJS.submit();

  }
  else {
    alert("No Tiene Productos en Su lista o NO ha seleccionado FICHA");
  }
}

</script>

<div class="modal fade" id="buscarP"   tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="largeModalLabel">Buscar Ficha Técnica</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
              <div class="row alert alert-success" style="display: none" id="verAccion">
                Ficha técnica agregada a la solicitud
              </div>
              <button type="button" class="btn btn-primary btn-sm" id="botonBuscarProducto">
                <i class="fa fa-dot-circle-o"></i> Buscar Producto
              </button>
              <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Reset
              </button>

          <div class="row table-responsive table--no-card m-b-30">
            <div class="table-responsive table-responsive-data2">
              <table class="table table-data2" id="Productos">
                <thead>
                  <tr>
                    <th style="display: none">id</th>
                    <th>Nombre Completo</th>
                    <th>Detalles de Producto</th>
                    <th>Precio Unitario</th>
                    <th>Unidad de Medida</th>
                    <th>Cantidad</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div>
</div>
<form class="" action="{{ Route('guardarSolicitud') }}" method="post" name="formularioJS">
  {{ CSRF_FIELD() }}
  <input type="hidden" name="id_ficha_JS" id="id_ficha_JS">
  <input type="hidden" name="productosJS" id="productosJS">
  <input type="hidden" name="id_area_formacionJS" id="id_area_formacionJS">
</form>
@endsection
