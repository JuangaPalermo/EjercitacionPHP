<?php
/*PALERMO JUAN GABRIEL

A. Obtener los detalles completos de todos los usuarios y poder ordenarlos
alfabéticamente de forma ascendente o descendente.
B. Obtener los detalles completos de todos los productos y poder ordenarlos
alfabéticamente de forma ascendente y descendente.
C. Obtener todas las compras filtradas entre dos cantidades.
D. Obtener la cantidad total de todos los productos vendidos entre dos fechas.
E. Mostrar los primeros “N” números de productos que se han enviado.
F. Mostrar los nombres del usuario y los nombres de los productos de cada venta.
G. Indicar el monto (cantidad * precio) por cada una de las ventas.
H. Obtener la cantidad total de un producto (ejemplo:1003) vendido por un usuario
(ejemplo: 104).
I. Obtener todos los números de los productos vendidos por algún usuario filtrado por
localidad (ejemplo: ‘Avellaneda’).
J. Obtener los datos completos de los usuarios filtrando por letras en su nombre o
apellido.
K. Mostrar las ventas entre dos fechas del año.
*/

include_once "./venta.php";
include_once "./producto.php";
include_once "./usuario.php";

/*A. Obtener los detalles completos de todos los usuarios y poder ordenarlos
alfabéticamente de forma ascendente o descendente.
*/
    // if(isset($_GET["orden"]))
    // {
    //     $usuariosOrdenados = Usuario::TraerTodosLosUsuariosOrdenados($_GET["orden"]);
    //     if($usuariosOrdenados)
    //     {
    //         print(Usuario::MostrarUsuariosHtml($usuariosOrdenados)); 
    //     }
    //     else
    //     {
    //         print("Error en el criterio de ordenamiento, debe ser 'ascendente' o 'descendente'.");
    //     }
    // }
    // else
    // {
    //     print("Error en los parametros");
    // }
    

/*B. Obtener los detalles completos de todos los productos y poder ordenarlos
alfabéticamente de forma ascendente y descendente.
*/
    // if(isset($_GET["orden"]))
    // {
    //     $productosOrdenados = Producto::TraerTodosLosProductosOrdenados($_GET["orden"]);
    //     if($productosOrdenados)
    //     {
    //         print(Producto::MostrarProductosHtml($productosOrdenados)); 
    //     }
    //     else
    //     {
    //         print("Error en el criterio de ordenamiento, debe ser 'ascendente' o 'descendente'.");
    //     }
    // }
    // else
    // {
    //     print("Error en los parametros");
    // }

/*C. Obtener todas las compras filtradas entre dos cantidades.
*/    
    // if(isset($_GET["minimo"]) && isset($_GET["maximo"]))
    // {
    //     $ventasGeneradas = Venta::TraerVentasEntreDosValores($_GET["minimo"], $_GET["maximo"]);

    //     if($ventasGeneradas)
    //     {
    //         print(Venta::MostrarVentasHtml($ventasGeneradas));
    //     }
    //     else
    //     {
    //         print("Error en los parametros recibidos, uno o mas no es numerico.");
    //     }
    // }    
    // else
    // {
    //     print("Error en los parametros!");
    // }

/*D. Obtener la cantidad total de todos los productos vendidos entre dos fechas.
*/
    // if(isset($_GET["minimo"]) && isset($_GET["maximo"]))
    // {
    //     $ventasGeneradas = Venta::TraerVentasEntreDosFechas($_GET["minimo"], $_GET["maximo"]);
    //     if($ventasGeneradas)
    //     {
    //         echo "La cantidad total de productos vendidos entre estas fechas es de: " . Venta::ObtenerCantidadTotal($ventasGeneradas);
    //     }
    //     else
    //     {
    //         print("Error en los parametros recibidos, revise las fechas indicadas");
    //     }
    // }    
    // else
    // {
    //     print("Error en los parametros!");
    // }

/*E. Mostrar los primeros “N” números de productos que se han enviado.
*/
    // if(isset($_GET["cantidad"]))
    // {
    //     $ventasGeneradas = Venta::TraerPrimerasVentas($_GET["cantidad"]);

    //     if($ventasGeneradas)
    //     {
    //         print(Venta::MostrarVentasHtml($ventasGeneradas));
    //     }
    //     else
    //     {
    //         print("Error en los parametros recibidos, revise las fechas indicadas");
    //     }
    // }    
    // else
    // {
    //     print("Error en los parametros!");
    // }

/*F. Mostrar los nombres del usuario y los nombres de los productos de cada venta.
*/
    // $listado = Venta::TraerUsuarioConProductoComprado();

    // foreach($listado as $elemento)
    // {
    //     echo "<ul>";
    //     foreach($elemento as $detalles)
    //     {
    //         echo "<li>$detalles</li>";
    //     }            
    //     echo "</ul>";
    // }

/* G. Indicar el monto (cantidad * precio) por cada una de las ventas.
*/
    // $listado = Venta::TraerTotalesPorVenta();

    // foreach($listado as $elemento)
    // {
    //     echo "<ul>";
    //     foreach($elemento as $detalles)
    //     {
    //         echo "<li>$detalles</li>";
    //     }            
    //     echo "</ul>";
    // }

/*H. Obtener la cantidad total de un producto (ejemplo:1003) vendido por un usuario (ejemplo: 104). 
*/
    // if(isset($_GET["idProducto"]) && isset($_GET["idUsuario"]))
    // {
    //     $listado = Venta::TraerTotalProductoPorUsuario($_GET["idProducto"], $_GET["idUsuario"]);

    //     if($listado)
    //     {
    //         foreach($listado as $elemento)
    //         {
    //             foreach($elemento as $detalles)
    //             {
    //                 echo "El cantidad del articulo ID " . $_GET["idProducto"] . " vendido por el usuario " . $_GET["idUsuario"] . ": " . $detalles;
    //             }            
    //         }
    //     }
    //     else
    //     {
    //         echo "Uno o mas de los parametros ingresados no son numericos.";
    //     }
    // }
    // else
    // {
    //     echo "Error, falta ingresar uno o mas parametros obligatorios para esta consulta";
    // }

/*I. Obtener todos los números de los productos vendidos por algún usuario filtrado por
localidad (ejemplo: ‘Avellaneda’).
*/
    // if(isset($_GET["localidad"]))
    // {
    //     $listado = Venta::TraerProductosVendidosSegunLocalidad($_GET["localidad"]);

    //     foreach($listado as $elemento)
    //     {
    //         echo "<ul>";
    //         foreach($elemento as $detalles)
    //         {
    //             echo "<li>$detalles</li>";
    //         }            
    //         echo "</ul>";
    //     }
    // }
    // else
    // {
    //     echo "Error, falta ingresar uno o mas parametros obligatorios para esta consulta";
    // }

/*J. Obtener los datos completos de los usuarios filtrando por letras en su nombre o
apellido.
*/
    // if(isset($_GET["comodin"]))
    // {
    //     $usuariosFiltrados = Usuario::TraerTodosLosUsuariosConDeterminadaLetra($_GET["comodin"]);

    //     print(Usuario::MostrarUsuariosHtml($usuariosFiltrados)); 
        
    // }
    // else
    // {
    //     print("Error, falta ingresar uno o mas parametros obligatorios para esta consulta");
    // }

/*K. Mostrar las ventas entre dos fechas del año.
*/

    // if(isset($_GET["minimo"]) && isset($_GET["maximo"]))
    // {
    //     $ventasGeneradas = Venta::TraerVentasEntreDosFechas($_GET["minimo"], $_GET["maximo"]);
    //     if($ventasGeneradas)
    //     {
    //         echo Venta::MostrarVentasHtml($ventasGeneradas);
    //     }
    //     else
    //     {
    //         print("Error en los parametros recibidos, revise las fechas indicadas");
    //     }
    // }    
    // else
    // {
    //     print("Error en los parametros!");
    // }

?>
