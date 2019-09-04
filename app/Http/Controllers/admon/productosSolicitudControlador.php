<?php

namespace App\Http\Controllers\admon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\productos_solicitudes;

class productosSolicitudControlador extends Controller
{
    public function guardarProductoSolicitud($id_solicitud, $id_producto, $_precio, $_cantidad)
    {
      $_productos_solicitudes = new productos_solicitudes();
      $_productos_solicitudes->solicitudes_id_solicitud = $id_solicitud;
      $_productos_solicitudes->productos_id_codigo_producto = $id_producto;
      $_productos_solicitudes->precio = $_precio;
      $_productos_solicitudes->cantidad = $_cantidad;
      $_productos_solicitudes->save();
    }
}
