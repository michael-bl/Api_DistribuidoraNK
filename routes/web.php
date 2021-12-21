<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

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
    return view('welcome');
});
//********************************RUTA LOGIN***************************************/
Route::get('login/{user}/{pass}', [MyController::class, 'login']);

//********************************RUTAS PROVEEDORES********************************/
Route::get('proveedores', [MyController::class, 'getProveedores']);
Route::get('proveedorxid/{id}', [MyController::class, 'getProveedorXid']);
Route::get('proveedorinactivo', [MyController::class, 'getProveedoresInactivos']);
Route::get('accionproveedor/{id}/{nombre}/{telefono}/{email}', [MyController::class, 'accionProveedor']);

//********************************RUTAS USUARIOS***********************************/
Route::get('usuarios', [MyController::class, 'getUsuarios']);
Route::get('usuarioxid/{id}', [MyController::class, 'getUsuarioXid']);
Route::get('usuarioinactivo', [MyController::class, 'getUsuariosInactivos']);
Route::get('accionusuario/{id}/{fk_localidad}/{nombre}/{pass}/{telefono}/{email}/{direccion}/{accion}/{estado}', [MyController::class, 'accionUsuario']);

//********************************RUTAS PRODUCTOS**********************************/
Route::get('productos', [MyController::class, 'getProductos']);
Route::get('productoxid/{id}', [MyController::class, 'getProductoXid']);
Route::get('productoinactivo', [MyController::class, 'getProductosInactivos']);
Route::get('accionproducto/{fk_unidad}/{descripcion}/{utilidad}/{precio_compra}/{precio_venta}/{id}/{accion}/{estado}', [MyController::class, 'accionProducto']);

//********************************RUTAS CLIENTES***********************************/
Route::get('clientes', [MyController::class, 'getClientes']);
Route::get('clientexid/{id}', [MyController::class, 'getClienteXid']);
Route::get('clienteinactivo', [MyController::class, 'getClientesInactivos']);
Route::get('accioncliente/{id}/{localidad}/{nombre}/{telefono}/{email}/{direccion}/{accion}/{estado}', [MyController::class, 'accionCliente']);
Route::post('accioncliente2', [MyController::class, 'accionCliente2']);

//********************************RUTAS LOCALIDAD**********************************/
Route::get('localidades', [MyController::class, 'getLocalidades']);
Route::get('localidadxid/{id}', [MyController::class, 'getLocalidadXid']);
Route::get('localidadinactiva', [MyController::class, 'getLocalidadesInactivas']);
Route::get('accionlocalidad/{id}/{localidad}/{estado}/{accion}', [MyController::class, 'accionLocalidad']);

//********************************RUTAS UNIDAD DE MEDIDA***************************/
Route::get('unidades', [MyController::class, 'getUnidades']);
Route::get('unidadxid/{id}', [MyController::class, 'getUnidadXid']);
Route::get('unidadinactiva', [MyController::class, 'getUnidadesInactivas']);
Route::get('accionunidad/{id}/{detalle}/{accion}/{estado}', [MyController::class, 'accionUnidad']);

//********************************RUTAS CABECERA FACTURA***************************/
Route::get('cabecerasfacturas', [MyController::class, 'getCabecerasFacturas']);
Route::get('cabecerafacturaxid/{id}', [MyController::class, 'getCabeceraFacturaXid']);
Route::get('actualizacabecerafactura/{id}/{tipo}/{fk_cliente}/{fecha}', [MyController::class, 'actualizaCabeceraFactura']);

//********************************RUTAS DETALLE FACTURA****************************/
Route::get('detallesfacturas', [MyController::class, 'getDetallesFacturas']);
Route::get('detallefacturaxid/{id}', [MyController::class, 'getDetalleFacturaXid']);
Route::get('acciondetallefactura/{id}/{fk_cabecera}/{fk_producto}/{utilidad}/{precio_compra}/{precio_venta}/{accion}', [MyController::class, 'accionDetalleFactura']);
