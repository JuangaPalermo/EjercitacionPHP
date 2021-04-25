<?php

require_once "./producto.php";


if(isset($_POST['codigoDeBarra']) && isset($_POST['nombre']) && isset($_POST['tipo']) && isset($_POST['stock']) && isset($_POST['precio']))
{
    $codigoDeBarra = $_POST['codigoDeBarra'];
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $stock = $_POST['stock'];
    $precio = $_POST['precio'];

    $producto = Producto::TraerUnProducto($codigoDeBarra);

    if($producto)
    {
        $producto->SetNombre($nombre);
        $producto->SetTipo($tipo);
        $producto->SetStock($stock);
        $producto->SetPrecio($precio);
        $producto->SetFechaDeModificacion(Producto::FechaActual());

        $producto->ModificarProductoParametros();

        echo "Se han realizado las modificaciones";
    }
    else
    {
        echo "Ese producto no existe";
    }
    

}
else
{
    echo "Error en los parametros";
}

?>