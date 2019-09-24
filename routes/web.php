<?php
use Vsmoraes\Pdf\Pdf;
//use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});//Vista de inicio de Sesion

Route::get('/fCambioClave', 'admon\usuarioControlador@formularioClave')->name('fCambioClave');//Cambio Clave
Route::post('/fCambioClave', 'admon\usuarioControlador@cambiarClave')->name('fCambioClave');//Cambio Clave
Route::post('/actualziarClave', 'admon\usuarioControlador@actualizarClave')->name('actualziarClave');//Cambio Clave

Route::get('/verProyectoPdf/{id}', function($id){
  $_ruta = public_path() . '/uploads/proyectos/' . $id . '.pdf';
  return response()->file($_ruta);
})->name('verProyectoPdf');//Para Ver PDF de Proyectos

Route::post('/consultarJS', 'admon\codigoUNSPSControlador@jsf')->name('consultarJS');
Route::post('/buscandoProducto', 'admon\productoControlador@buscandoProducto')->name('buscandoProducto');
Route::post('/buscarFuncionario', 'admon\usuarioControlador@buscarFuncionario')->name('buscarFuncionario');
//********Autenticacion de Usuario*******
Route::any('/login', 'iniciarControlador@index')->name('login');
Route::get('/salir', 'iniciarControlador@salir')->name('salir');
//*****Fin de Autenticacion de Usuario****

//*** RUTAS DE USUARIOS AUTENTICADOS *******
Route::middleware(['auth'])->group(function(){
  Route::get('/dashboard', 'admon\dashboardControlador@index')->name('dashboard');
  Route::post('/buscandoCodigoUNSPSC', 'admon\codigoUNSPSControlador@buscandoCodigoUNSPSC')->name('buscandoCodigoUNSPSC');
  Route::get('/buscarCodigoUNSPSC', 'admon\codigoUNSPSControlador@buscarCodigoUNSPSC')->name('buscarCodigoUNSPSC');
  Route::get('/solicitarCodigoUNSPSC', 'admon\codigoUNSPSControlador@solicitarCodigoUNSPSC')->name('solicitarCodigoUNSPSC');
  Route::post('/solicitandoCodigoUNSPSC', 'admon\codigoUNSPSControlador@solicitandoCodigo')->name('solicitandoCodigoUNSPSC');
  Route::get('/buscarProducto', 'admon\productoControlador@buscarProducto')->name('buscarProducto');
  Route::post('/guardarSolicitud', 'admon\solicitudControlador@guardarSolicitud')->name('guardarSolicitud');
  Route::get('/listarSolicitud', 'admon\solicitudControlador@listarSolicitud')->name('listarSolicitud');
  Route::post('/listaSolicitud', 'admon\solicitudControlador@listaSolicitud')->name('listaSolicitud');
  Route::post('/actualizarSolicitud', 'admon\solicitudControlador@actualizarSolicitud')->name('actualizarSolicitud');
  Route::get('/eliminarProductoSolicitud/{id}/{id_solicitud}', 'admon\solicitudControlador@eliminarProductoSolicitud')->name('eliminarProductoSolicitud');
  Route::get('/buscarProducto', 'admon\productoControlador@buscarProducto')->name('buscarProducto');
  Route::get('/noAcceso', function(){ return view('noAcceso'); })->name('noAcceso');//--> Ruta no Permitida

});
//*** FIN RUTAS DE USUARIOS AUTENTICADOS *******


//*** RUTAS DE ADMINSITRADOR *******
Route::middleware(['auth', 'rolAdmonMiddleware'])->group(function(){
  Route::get('/crearUsuario', 'admon\usuarioControlador@crearUsuario')->name('crearUsuario');
  Route::post('/guardarUsuario', 'admon\usuarioControlador@guardarUsuario')->name('guardarUsuario');
  Route::get('/modificarUsuario', 'admon\usuarioControlador@modificarUsuario')->name('modificarUsuario');
  Route::post('/actualizarUsuario', 'admon\usuarioControlador@actualizarUsuario')->name('actualizarUsuario');
  Route::post('/buscarUsuario', 'admon\usuarioControlador@buscarUsuario')->name('buscarUsuario');
  Route::post('/actualizandoUsuario', 'admon\usuarioControlador@actualizando')->name('actualizandoUsuario');
  Route::get('/areas', 'admon\areasControlador@index')->name('areas');
  Route::post('/guardarArea', 'admon\areasControlador@guardarArea')->name('guardarArea');
  Route::post('/desargarReporteAprobado', 'admon\reportes@reporteAprobados')->name('desargarReporteAprobado');//Reporte
  Route::get('/desargarReporteAprobado', 'admon\reportes@index')->name('index');//Reporte
  Route::post('/solicitudesAprobadas', 'admon\reportes@solicitudesAprobadas')->name('solicitudesAprobadas');//Reporte

});
//*** FIN RUTA DE ADMINISTRADOR*****
//*** RUTAS DE USUARIOS AUTENTICADOS COMO GESTORES DE AREA *******
Route::middleware(['auth', 'rolGestorAreaMiddleware'])->group(function(){
  Route::get('/programaFormacion', 'admon\programaFormacionControlador@index')->name('programaFormacion');
  Route::post('/guardarProgramaFormacion', 'admon\programaFormacionControlador@guardarProgramaFormacion')->name('guardarProgramaFormacion');
  Route::get('/listarPrograma', 'admon\programaFormacionControlador@listarPrograma')->name('listarPrograma');
  Route::post('/modificarPrograma', 'admon\programaFormacionControlador@modificarPrograma')->name('modificarPrograma');
  Route::get('/proyecto', 'admon\proyectoControlador@index')->name('proyecto');
  Route::post('/guarProyecto', 'admon\proyectoControlador@guardarProyecto')->name('guardarProyecto');
  Route::get('/listarProyecto', 'admon\proyectoControlador@listarProyecto')->name('listarProyecto');
  Route::get('/ficha', 'admon\fichaControlador@index')->name('ficha');
  Route::post('/guardarFicha', 'admon\fichaControlador@guardarFicha')->name('guardarFicha');
  Route::get('/codigoUNSPSC', 'admon\codigoUNSPSControlador@index')->name('codigoUNSPSC');
  Route::post('/guardarCodigo', 'admon\codigoUNSPSControlador@guardarCodigo')->name('guardarCodigo');
  Route::any('/aprobarCodigoUNSPSC', 'admon\codigoUNSPSControlador@aprobarCodigo')->name('aprobarCodigoUNSPSC');
  Route::get('/crearProducto', 'admon\productoControlador@index')->name('crearProducto');
  Route::post('/guardarProducto', 'admon\productoControlador@guardarProducto')->name('guardarProducto');
  Route::get('/crearProducto', 'admon\productoControlador@index')->name('crearProducto');
  Route::post('/guardarProducto', 'admon\productoControlador@guardarProducto')->name('guardarProducto');
  Route::get('/modificarProducto/{id?}', 'admon\productoControlador@modificar')->name('modificarProducto');
  Route::post('/actualizandoProducto', 'admon\productoControlador@actualizando')->name('actualizandoProducto');
});
//*** FIN RUTAS DE USUARIOS AUTENTICADOS COMO GESTORES DE AREA  *******

//*** RUTAS DE USUARIOS AUTENTICADOS *******
Route::middleware(['auth', 'rolInstructorMiddleware'])->group(function(){
  Route::get('/crearSolicitud', 'admon\solicitudControlador@index')->name('crearSolicitud');

  Route::post('/buscandoCodigoUNSPSC', 'admon\codigoUNSPSControlador@buscandoCodigoUNSPSC')->name('buscandoCodigoUNSPSC');
  
  
  Route::post('/solicitandoCodigoUNSPSC', 'admon\codigoUNSPSControlador@solicitandoCodigo')->name('solicitandoCodigoUNSPSC');
  
});
//*** FIN RUTAS DE USUARIOS AUTENTICADOS *******

//*** RUTAS DE USUARIOS AUTENTICADOS COMO COORDINADORES *******
Route::middleware(['auth', 'rolCoordinadorMiddleware'])->group(function(){
  Route::get('/aprobarSolicitud/', 'admon\solicitudControlador@aprobarSolicitud')->name('aprobarSolicitud');
  Route::get('/solicitarAprobarSolicitud/{id?}', 'admon\solicitudControlador@solicitarAprobarSolicitud')->name('solicitarAprobarSolicitud');
  Route::get('/solicitarNoAprobarSolicitud/{id?}/{motivo?}', 'admon\solicitudControlador@solicitarNoAprobarSolicitud')->name('solicitarNoAprobarSolicitud');
  Route::get('/HistorialSolicitud/', 'admon\solicitudControlador@HistorialSolicitud')->name('HistorialSolicitud');
});
//*** FIN RUTAS DE USUARIOS AUTENTICADOS *******

//*** RUTAS DE USUARIOS AUTENTICADOS COMO COORDINADORES *******
Route::middleware(['auth', 'rolAlmancenMiddleware'])->group(function(){
  Route::get('/ingresoAlmacen/', 'admon\almacenControlador@ingreso')->name('ingresoAlmacen');
  Route::post('/guardarEntradaA', 'admon\almacenControlador@guardarEntradaAlmacen')->name('guardarEntradaA');
  Route::get('/salidaAlmacen', 'admon\almacenControlador@salidaAlmacen')->name('salidaAlmacen');
  Route::post('/guardarSalidaA', 'admon\almacenControlador@guardarSalidaAlmacen')->name('guardarSalidaA');
});
//*** FIN RUTAS DE USUARIOS AUTENTICADOS *******

Route::get('/limpiarConfiguracion/{clave}', function($clave){

  if($clave == 'wramirez')
  {
    Artisan::call('config:clear');
    return 'Limpieza de Cache';
  }
  else
  {
    return 'No se realizo la acción';
  }
  
});
Route::get('/limpiarCache', function(){
  Artisan::call('cache:clear');
  return 'Limpieza de Cache';
});
Route::get('/seed/{clave}', function($clave){

  if($clave == 'wramirez')
  {
    Artisan::call('db:seed');
    return 'Seed Ejecutadp';
  }
  else
  {
    return 'No se realizo la acción';
  }
  
});