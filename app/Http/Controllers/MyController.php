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

    public function getProveedores()
    {
        $resultado = DB::select('select * from view_proveedores');
        return response()->json_string = json_encode($resultado);
    }

    public function getProveedoresInactivos()
    {
        $resultado = DB::select('select * from view_proveedores_inactivos');
        return response()->json_string = json_encode($resultado);
    }

    public function getProveedorXid($id)
    {
        $resultado = DB::select('select * from proveedor where id = ?', [$id]);
        return response()->json_string = json_encode($resultado);
    }

    /** Funcion realiza 3 acciones distintas sobre objeto proveedor, inserta nuevo, actualiza o deshabilita */
    public function accionProveedor($id, $nombre, $telefono, $email, $accion, $estado)
    {

        switch ($accion) {
            case 0;
                $resultado = DB::insert('insert into proveedor (id, nombre, telefono, email, estado) values (?, ?, ?, ?, ?)', [$id, $nombre, $telefono, $email, $estado]);
                return response()->json_string = json_encode(array('result' => $resultado,));
                break;
            case 1;
                $resultado = DB::update('update proveedor set nombre = ?, telefono = ?, email = ?, estado = ? where id = ?', [$nombre, $telefono, $email, $estado, $id]);
                return response()->json_string = json_encode(array('result' => $resultado,));
                break;
            case 2;
                $resultado = DB::update('update proveedor set estado = ? where id = ?', [$estado, $id]);
                return response()->json_string = json_encode(array('result' => $resultado,));
                break;
        }
    }

    //********************************CRUD USUARIOS********************************/
    public function getUsuarios()
    {
        $resultado = DB::select('select * from view_usuarios');
        return response()->json_string = json_encode($resultado);
    }

    public function getUsuariosInactivos()
    {
        $resultado = DB::select('select * from view_usuarios_inactivos');
        return response()->json_string = json_encode($resultado);
    }

    public function getUsuarioXid($id)
    {
        $resultado = DB::select('select * from usuario where id = ?', [$id]);
        return response()->json_string = json_encode($resultado);
    }

    /** Funcion realiza 3 acciones distintas sobre objeto usuario, inserta nuevo, actualiza o deshabilita */
    public function accionUsuario($id, $fk_localidad, $nombre, $pass, $telefono, $email, $direccion, $accion, $estado)
    {

        switch ($accion) {
            case 0;
                $resultado = DB::insert('insert into usuario (id, fk_localidad, nombre, pass, telefono, email, direccion, estado) values (?, ?, ?, ?, ?, ?, ?, ?)', [$id, $fk_localidad, $nombre, $pass, $telefono, $email, $direccion, $estado]);
                return response()->json_string = json_encode(array('result' => $resultado,));
                break;
            case 1;
                $resultado = DB::update('update usuario set fk_localidad = ?, nombre = ?, pass = ?, telefono = ?, email = ?, direccion = ?, estado = ? where id = ?', [$id, $fk_localidad, $nombre, $pass, $telefono, $email, $direccion, $estado]);
                return response()->json_string = json_encode(array('result' => $resultado,));
                break;
            case 2;
                $resultado = DB::update('update usuario set estado = ? where id = ?', [$estado, $id]);
                return response()->json_string = json_encode(array('result' => $resultado,));
                break;
        }
    }


    //********************************CRUD PRODUCTOS********************************/
    /** Devuelve una lista de productos activos*/
    public function getProductos()
    {
        $resultado = DB::select('select * from view_productos');
        return response()->json_string = json_encode($resultado);
    }

    public function getProductosInactivos()
    {
        $resultado = DB::select('select * from view_productos_inactivos');
        return response()->json_string = json_encode($resultado);
    }

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
    public function getClientes()
    {
        $resultado = DB::select('select * from cliente');
        return response()->json_string = json_encode($resultado);
    }

    public function getClientesInactivos()
    {
        $resultado = DB::select('select * from view_localidades_inactivas');
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
    public function accionLocalidad($id, $localidad, $accion, $estado)
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
    public function getUnidades()
    {
        $resultado = DB::select('select * from view_unidades');
        return response()->json_string = json_encode($resultado);
    }

    public function getUnidadesInactivas()
    {
        $resultado = DB::select('select * from view_unidades_inactivas');
        return response()->json_string = json_encode($resultado);
    }

    public function getUnidadXid($id)
    {
        $resultado = DB::select('select * from unidad where id = ?', [$id]);
        return response()->json_string = json_encode($resultado);
    }

    /** Funcion realiza 3 acciones distintas sobre objeto unidad, inserta nuevo, actualiza o deshabilita */
    public function accionUnidad($id, $detalle, $accion, $estado)
    {

        switch ($accion) {
            case 0;
                $resultado = DB::insert('insert into unidad (id, detalle, estado) values (?, ?, ?)', [$id, $detalle, $estado]);
                return response()->json_string = json_encode(array('result' => $resultado,));
                break;
            case 1;
                $resultado = DB::update('update unidad set localidad = ?, estado = ? where id = ?', [$detalle, $estado, $id]);
                return response()->json_string = json_encode(array('result' => $resultado,));
                break;
            case 2;
                $resultado = DB::update('update unidad set estado = ? where id = ?', [$estado, $id]);
                return response()->json_string = json_encode(array('result' => $resultado,));
                break;
        }
    }


    //********************************CRUD CABECERA FACTURA********************************/
    public function getCabecerasFacturas()
    {
        $resultado = DB::select('select * from view_cabecera_facturas');
        return response()->json_string = json_encode($resultado);
    }

    public function getCabeceraFacturaXid($id)
    {
        $resultado = DB::select('select * from cabecera_factura where id = ?', [$id]);
        return response()->json_string = json_encode($resultado);
    }

    public function actualizaCabeceraFactura($id, $tipo, $fk_cliente, $fecha)
    {
        $resultado = DB::update('update cabecera_factura set tipo = ?, fk_cliente = ?, fecha = ? where id = ?', [$tipo, $fk_cliente, $fecha, $id]);
        return response()->json_string = json_encode($resultado);
    }



    //********************************CRUD DETALLE FACTURA********************************/
    public function getDetallesFacturas()
    {
        $resultado = DB::select('select * from view_detalle_facturas');
        return response()->json_string = json_encode($resultado);
    }

    public function getDetalleFacturaXid($id)
    {
        $resultado = DB::select('select * from detalle_factura where id = ?', [$id]);
        return response()->json_string = json_encode($resultado);
    }

    /** Funcion realiza 3 acciones distintas sobre objeto detalle factura, inserta nuevo, actualiza o deshabilita */
    public function accionDetalleFactura($id, $fk_cabecera, $fk_producto, $utilidad, $precio_compra, $precio_venta, $accion)
    {

        switch ($accion) {
            case 0;
                $resultado = DB::insert('insert into detalle_factura (id, fk_cabecera, fk_producto, utilidad, precio_compra, precio_venta) values (?, ?, ?, ?, ?, ?)', [$id, $fk_cabecera, $fk_producto, $utilidad, $precio_compra, $precio_venta]);
                return response()->json_string = json_encode(array('result' => $resultado,));
                break;
            case 1;
                $resultado = DB::update('update detalle_factura set fk_cabecera = ?, fk_producto = ?, utilidad = ?, precio_compra = ?, precio_venta = ? where id = ?', [$fk_cabecera, $fk_producto, $utilidad, $precio_compra, $precio_venta, $id]);
                return response()->json_string = json_encode(array('result' => $resultado,));
                break;
        }
    }
}
