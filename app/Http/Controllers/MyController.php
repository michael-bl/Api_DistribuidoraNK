<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class MyController extends Controller
{

    public function login($usuario, $pass)
    {
        $resultado = DB::select('select id, pass, nombre from usuario where id=(?) and pass=(?)', [$usuario, $pass]);
        return response()->json_string = json_encode($resultado);
    }


    //********************************CRUD PROVEEDORES********************************/

    public function nuevoProveedor($id, $nombre, $telefono, $email)
    {
        $resultado = DB::insert('insert into proveedor (id, nombre, telefono, email) values (?, ?, ?, ?)', [$id, $nombre, $telefono, $email]);
        return response()->json_string = json_encode($resultado);
    }

    public function getProveedores()
    {
        $resultado = DB::select('select * from proveedor');
        return response()->json_string = json_encode($resultado);
    }

    public function getProveedorXid($id)
    {
        $resultado = DB::select('select * from proveedor where id = ?', [$id]);
        return response()->json_string = json_encode($resultado);
    }

    public function actualizaProveedor($id, $nombre, $telefono, $email)
    {
        $resultado = DB::update('update proveedor set nombre = ?, telefono = ?, email = ? where id = ?', [$nombre, $telefono, $email, $id]);
        return response()->json_string = json_encode($resultado);
    }

    public function eliminaProveedor($id)
    {
        $resultado = DB::delete('delete proveedor where id = ?', [$id]);
        return response()->json_string = json_encode($resultado);
    }

    //********************************CRUD USUARIOS********************************/
    public function nuevoUsuario($id, $fk_localidad, $nombre, $pass, $telefono, $email, $direccion)
    {
        $resultado = DB::insert('insert into usuario (id, fk_localidad, nombre, pass, telefono, email, direccion) values (?, ?, ?, ?, ?, ?, ?)', [$id, $fk_localidad, $nombre, $pass, $telefono, $email, $direccion]);
        return response()->json_string = json_encode($resultado);
    }

    public function getUsuarios()
    {
        $resultado = DB::select('select * from usuario');
        return response()->json_string = json_encode($resultado);
    }

    public function getUsuarioXid($id)
    {
        $resultado = DB::select('select * from usuario where id = ?', [$id]);
        return response()->json_string = json_encode($resultado);
    }

    public function actualizaUsuario($fk_localidad, $nombre, $pass, $telefono, $email, $direccion, $id)
    {
        $resultado = DB::update('update usuario set fk_localidad = ?, nombre = ?, pass = ?, telefono = ?, email = ?, direccion = ? where id = ?', [$fk_localidad, $nombre, $pass, $telefono, $email, $direccion, $id]);
        return response()->json_string = json_encode($resultado);
    }

    public function eliminaUsuario($id)
    {
        $resultado = DB::delete('delete usuario where id = ?', [$id]);
        return response()->json_string = json_encode($resultado);
    }


    //********************************CRUD PRODUCTOS********************************/
    /** Devuelve una lista de productos activos*/
    public function getProductos()
    {
        $resultado = DB::select('select * from view_productos');
        return response()->json_string = json_encode($resultado);
    }

    /** Devuelve lista de productos inactivos*/
    public function getProductosInactivos()
    {
        $resultado = DB::select('select * from view_productos_inactivos');
        return response()->json_string = json_encode($resultado);
    }

    /** Devuelve producto segun id*/
    public function getProductoXid($id)
    {
        $resultado = DB::select('select * from producto where id = ?', [$id]);
        return response()->json_string = json_encode($resultado);
    }

    /** Funcion realiza 3 acciones distintas sobre objeto producto, inserta nuevo, actualiza o deshabilita */
    public function accionProducto($id, $fk_unidad, $descripcion, $utilidad, $precio_compra, $precio_venta, $accion, $estado)
    {

        switch ($accion) {
            case 0;
                $resultado = DB::insert('insert into producto (id, fk_unidad, descripcion, utilidad, precio_compra, precio_venta, estado) values (?, ?, ?, ?, ?, ?, ?)', [null, $fk_unidad, $descripcion, $utilidad, $precio_compra, $precio_venta, $estado]);
                return response()->json_string = json_encode(array('result' => $resultado,));
                break;
            case 1;
                $resultado = DB::update('update producto set fk_unidad = ?, descripcion = ?, utilidad = ?, precio_compra = ?, precio_venta = ?, estado = ? where id = ?', [$fk_unidad, $descripcion, $utilidad, $precio_compra, $precio_venta, $estado, $id]);
                return response()->json_string = json_encode(array('result' => $resultado,));
                break;
            case 2;
                $resultado = DB::update('update producto set estado = ? where id = ?', [$estado, $id]);
                return response()->json_string = json_encode(array('result' => $resultado,));
                break;
        }
    }



    //********************************CRUD CLIENTES********************************/
    //** de momento esta funcion no sirve*/
    public function accionCliente2(Request $request)
    {
        $id = $request->id;
        $email = $request->email;
        $accion = $request->accion;
        $nombre = $request->nombre;
        $estado = $request->estado;
        $telefono = $request->telefono;
        $direccion = $request->direccion;
        $fk_localidad = $request->fk_localidad;
        dd($nombre);

        switch ($accion) {
            case 0;
                $resultado = DB::insert('insert into cliente (id, fk_localidad, nombre, telefono, email, direccion) values (?, ?, ?, ?, ?, ?)', [$id, $fk_localidad, $nombre, $telefono, $email, $direccion]);
                return response()->json_string = json_encode(array('result' => $resultado,));
                break;
            case 1;
                $resultado = DB::update('update cliente set fk_localidad = ?, nombre = ?, telefono = ?, email = ?, direccion = ? where id = ?', [$fk_localidad, $nombre, $telefono, $email, $direccion, $id]);
                return response()->json_string = json_encode(array('result' => $resultado,));
                break;
            case 2;
                $resultado = DB::delete('update cliente set estado = ? where id = ?', [$estado, $id]);
                return response()->json_string = json_encode(array('result' => $resultado,));
                break;
        }
    }

    public function getClientes()
    {
        $resultado = DB::select('select * from cliente');
        return response()->json_string = json_encode($resultado);
    }

    public function getClienteXid($id)
    {
        $resultado = DB::select('select * from cliente where id = ?', [$id]);
        return response()->json_string = json_encode($resultado);
    }

    /** Funcion realiza 3 acciones distintas sobre objeto cliente, inserta nuevo, actualiza o deshabilita */
    public function accionCliente($id, $fk_localidad, $nombre, $telefono, $email, $direccion, $accion, $estado)
    {

        switch ($accion) {
            case 0;
                $resultado = DB::insert('insert into cliente (id, fk_localidad, nombre, telefono, email, direccion) values (?, ?, ?, ?, ?, ?)', [$id, $fk_localidad, $nombre, $telefono, $email, $direccion]);
                return response()->json_string = json_encode(array('result' => $resultado,));
                break;
            case 1;
                $resultado = DB::update('update cliente set fk_localidad = ?, nombre = ?, telefono = ?, email = ?, direccion = ? where id = ?', [$fk_localidad, $nombre, $telefono, $email, $direccion, $id]);
                return response()->json_string = json_encode(array('result' => $resultado,));
                break;
            case 2;
                $resultado = DB::update('update cliente set estado = ? where id = ?', [$estado, $id]);
                return response()->json_string = json_encode(array('result' => $resultado,));
                break;
        }
    }


    //********************************CRUD LOCALIDAD********************************/
    /** Devuelve una lista de localidades activas*/
    public function getLocalidades()
    {
        $resultado = DB::select('select * from view_localidades');
        return response()->json_string = json_encode($resultado);
    }

    /** Devuelve lista de localidades inactivas*/
    public function getLocalidadesInactivas()
    {
        $resultado = DB::select('select * from view_localidades_inactivas');
        return response()->json_string = json_encode($resultado);
    }

    public function getLocalidadXid($id)
    {
        $resultado = DB::select('select * from localidad where id = ?', [$id]);
        return response()->json_string = json_encode($resultado);
    }

    /** Funcion realiza 3 acciones distintas sobre objeto localidad, inserta nuevo, actualiza o deshabilita */
    public function accionLocalidad($id, $ocalidad, $accion, $estado)
    {

        switch ($accion) {
            case 0;
                $resultado = DB::insert('insert into localidad (id, localidad, estado) values (?, ?, ?)', [$id, $localidad, $estado]);
                return response()->json_string = json_encode(array('result' => $resultado,));
                break;
            case 1;
                $resultado = DB::update('update localidad set localidad = ?, estado = ? where id = ?', [$localidad, $estado, $id]);
                return response()->json_string = json_encode(array('result' => $resultado,));
                break;
            case 2;
                $resultado = DB::update('update localidad set estado = ? where id = ?', [$estado, $id]);
                return response()->json_string = json_encode(array('result' => $resultado,));
                break;
        }
    }

    //********************************CRUD UNIDAD DE MEDIDA********************************/
    public function nuevaUnidad($id, $detalle)
    {
        $resultado = DB::insert('insert into unidad (id, detalle) values (?, ?)', [$id, $detalle]);
        return response()->json_string = json_encode($resultado);
    }

    public function getUnidad()
    {
        $resultado = DB::select('select * from unidad');
        return response()->json_string = json_encode($resultado);
    }

    public function getUnidadXid($id)
    {
        $resultado = DB::select('select * from unidad where id = ?', [$id]);
        return response()->json_string = json_encode($resultado);
    }

    public function actualizaUnidad($detalle, $id)
    {
        $resultado = DB::update('update unidad set detalle = ? where id = ?', [$detalle, $id]);
        return response()->json_string = json_encode($resultado);
    }

    public function eliminaUnidad($id)
    {
        $resultado = DB::delete('delete unidad where id = ?', [$id]);
        return response()->json_string = json_encode($resultado);
    }


    //********************************CRUD CABECERA FACTURA********************************/
    public function nuevaCabeceraFactura($id, $tipo, $fk_cliente, $fecha)
    {
        $resultado = DB::insert('insert into cabecera_factura (id, tipo, fk_cliente, fecha) values (?, ?, ?, ?)', [$id, $tipo, $fk_cliente, $fecha]);
        return response()->json_string = json_encode($resultado);
    }

    public function getCabeceraFactura()
    {
        $resultado = DB::select('select * from cabecera_factura');
        return response()->json_string = json_encode($resultado);
    }

    public function getCabeceraFacturaXid($id)
    {
        $resultado = DB::select('select * from cabecera_factura where id = ?', [$id]);
        return response()->json_string = json_encode($resultado);
    }

    public function actualizaCabeceraFactura($tipo, $fk_cliente, $fecha, $id)
    {
        $resultado = DB::update('update cabecera_factura set tipo = ?, fk_cliente = ?, fecha = ? where id = ?', [$tipo, $fk_cliente, $fecha, $id]);
        return response()->json_string = json_encode($resultado);
    }

    public function eliminaCabeceraFactura($id)
    {
        $resultado = DB::delete('delete cabecera_factura where id = ?', [$id]);
        return response()->json_string = json_encode($resultado);
    }

    //********************************CRUD DETALLE FACTURA********************************/
    public function nuevoDetalleFactura($id, $fk_cabecera, $fk_producto, $utilidad, $precio_k, $precio_cliente)
    {
        $resultado = DB::insert('insert into detalle_factura (id, fk_cabecera, fk_producto, utilidad, precio_k, precio_cliente) values (?, ?, ?, ?, ?, ?)', [$id, $fk_cabecera, $fk_producto, $utilidad, $precio_k, $precio_cliente]);
        return response()->json_string = json_encode($resultado);
    }

    public function getDetalleFactura()
    {
        $resultado = DB::select('select * from detalle_factura');
        return response()->json_string = json_encode($resultado);
    }

    public function getDetalleFacturaXid($id)
    {
        $resultado = DB::select('select * from detalle_factura where id = ?', [$id]);
        return response()->json_string = json_encode($resultado);
    }

    public function actualizaDetalleFactura($fk_cabecera, $fk_producto, $utilidad, $precio_k, $precio_cliente, $id)
    {
        $resultado = DB::update('update detalle_factura set fk_cabecera = ?, fk_producto= ?, utilidad= ?, precio_k= ?, precio_cliente = ? where id = ?', [$fk_cabecera, $fk_producto, $utilidad, $precio_k, $precio_cliente, $id]);
        return response()->json_string = json_encode($resultado);
    }

    public function eliminaDetalleFactura($id)
    {
        $resultado = DB::delete('delete detalle_factura where id = ?', [$id]);
        return response()->json_string = json_encode($resultado);
    }
}
