<?php

/*PALERMO JUAN GABRIEL

Aplicación No 31 (RealizarVenta BD )
Archivo: RealizarVenta.php
método:POST
Recibe los datos del producto(código de barra), del usuario (el id )y la cantidad de ítems ,por
POST .
Verificar que el usuario y el producto exista y tenga stock.
Retorna un :
“venta realizada”Se hizo una venta
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesarios en las clases*/

require_once "./usuario.php";
require_once "./producto.php";
require_once "./venta.php";

if (isset($_POST["codigo_de_barra"]) && isset($_POST["id_usuario"]) && isset($_POST["cantidad_items"]))
{
    $codigoDeBarra = $_POST["codigo_de_barra"];
    $id_usuario = $_POST["id_usuario"];
    $cantidad = $_POST["cantidad_items"];
    
    $producto = Producto::TraerUnProducto($codigoDeBarra);
    $usuario = Usuario::TraerUnUsuario($id_usuario);

    //validar si existe el producto (traer el producto), y el usuario y si tiene stock, realizar la venta
    if($producto && $usuario && $producto->GetStock() >= $cantidad)
    {
        //restar el stock del producto
        $producto->SetStock(($producto->GetStock() - $cantidad));
        $producto->ModificarProductoParametros();

        //registrar la venta en la bbdd
        $venta = Venta::__crearVentaParametros($id_usuario, $producto->GetId(), $cantidad);
        $retorno = $venta->InsertarVentaParametros();

        echo "Se realizo la venta y se registro bajo el ID " . $retorno;
    }
    else
    {
        //si no tiene stock, informar que no se pudo hacer
        echo "No se pudo hacer";
    }    
}
else
{
    echo "Error en los datos recibidos";
}
?>