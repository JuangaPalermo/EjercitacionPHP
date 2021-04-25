<?php

class Venta {


///ATRIBUTOS
    protected $idVenta;
    protected $idProducto;
    protected $idUsuario;
    protected $cantidad;
    protected $fechaDeVenta;
///

///PROPIEDADES
    public function GetIdVenta()
    {
        return $this->idVenta;
    }
    public function GetIdProducto()
    {
        return $this->idProducto;
    }
    public function GetIdUsuario()
    {
        return $this->idUsuario;
    }
    public function GetCantidad()
    {
        return $this->cantidad;
    }
    public function GetFechaDeVenta()
    {
        return $this->fechaDeVenta;
    }

    public function SetIdVenta($value)
    {
        $this->idVenta = $value;
    }
    public function SetIdProducto($value)
    {
        $this->idProducto = $value;
    }
    public function SetIdUsuario($value)
    {
        $this->idUsuario = $value;
    }
    public function SetCantidad($value)
    {
        $this->cantidad = $value;
    }
    public function SetFechaDeVenta($value)
    {
        $this->fechaDeVenta = $value;
    }
///

///CONSTRUCTOR

    public function __construct(){}

    public static function __crearVentaParametros($idUsuario, $idProducto, $cantidad)
    {
        if($idUsuario !== NULL && $idProducto !== NULL && $cantidad !== NULL)
        {
            $venta = new Venta();

            $venta->SetIdUsuario($idUsuario);
            $venta->SetIdProducto($idProducto);
            $venta->SetCantidad($cantidad);
            $venta->SetFechaDeVenta(date("Y-m-d"));

            return $venta;
        }

        return NULL;
    }

///

///GENERALES
    public function MostrarVenta()
    {
        return " - ID Venta: " . $this->GetIdVenta() .
            " - ID Producto: " . $this->GetIdProducto() .
            " - ID Usuario: " . $this->GetIdUsuario() . 
            " - Cantidad: " . $this->GetCantidad() . 
            " - Fecha de venta: " . $this->GetFechaDeVenta();
    } 

    public static function FormatDate($fecha)
    {
        $auxFecha = str_replace("/","-",$fecha);
        $retorno = date("Y-m-d", strtotime($auxFecha));
        return $retorno;
    }

    public static function ObtenerCantidadTotal($listaVentas)
    {
        $retorno = 0;

        foreach($listaVentas as $venta)
        {
            $retorno += $venta->GetCantidad();
        }

        return $retorno;
    }

///HTML

    public static function MostrarVentasHtml($listaVentas)    
    {
        $retorno = "<ul>";

        foreach($listaVentas as $venta)
        {
            $retorno .= "<li>".$venta->MostrarVenta()."</li>";
        }

        $retorno .= "</ul>";

        return $retorno;
    }

///SQL

    public function InsertarVentaParametros()
    {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into venta (id_producto,id_usuario,cantidad,fecha_de_venta)
                                                                values(:id_producto,:id_usuario,:cantidad,:fecha_de_venta)");
            $consulta->bindValue(':id_producto',$this->GetIdProducto(), PDO::PARAM_INT);
            $consulta->bindValue(':id_usuario', $this->GetIdUsuario(), PDO::PARAM_INT);
            $consulta->bindValue(':cantidad', $this->GetCantidad(), PDO::PARAM_INT);
            $consulta->bindValue(':fecha_de_venta', $this->GetFechaDeVenta(), PDO::PARAM_STR);
            $consulta->execute();
            return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }

    public static function TraerVentasEntreDosValores($minimo, $maximo)
    {
        if(is_numeric($minimo) && is_numeric($maximo))
        {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT id as idVenta, 
                                                            id_producto as idProducto,
                                                            id_usuario as idUsuario,
                                                            cantidad as cantidad,
                                                            fecha_de_venta as fechaDeVenta
                                                            FROM venta
                                                            WHERE cantidad >= $minimo AND cantidad <= $maximo");
            $consulta->execute();			
            return $consulta->fetchAll(PDO::FETCH_CLASS, "venta");
        }
        else
        {
            return NULL;
        }
    } 
    
    public static function TraerVentasEntreDosFechas($fechaMinima, $fechaMaxima)
    {
        $fechaMinimaFormateada = Venta::FormatDate($fechaMinima);
        $fechaMaximaFormateada = Venta::FormatDate($fechaMaxima);

        if($fechaMinimaFormateada && $fechaMaximaFormateada)
        {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT id as idVenta, 
                                                            id_producto as idProducto,
                                                            id_usuario as idUsuario,
                                                            cantidad as cantidad,
                                                            fecha_de_venta as fechaDeVenta
                                                            FROM venta
                                                            WHERE fecha_de_venta BETWEEN :fechaMinima AND :fechaMaxima");
            $consulta->bindValue(':fechaMaxima', $fechaMaximaFormateada, PDO::PARAM_STR);
            $consulta->bindValue(':fechaMinima', $fechaMinimaFormateada, PDO::PARAM_STR);
            $consulta->execute();			
            return $consulta->fetchAll(PDO::FETCH_CLASS, "venta");
        }
        else
        {
            return NULL;
        }    
    } 

    public static function TraerPrimerasVentas($cantidad)
    {
        if(is_numeric($cantidad))
        {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT id as idVenta, 
                                                            id_producto as idProducto,
                                                            id_usuario as idUsuario,
                                                            cantidad as cantidad,
                                                            fecha_de_venta as fechaDeVenta
                                                            FROM venta
                                                            ORDER BY fecha_de_venta ASC
                                                            LIMIT $cantidad");
            $consulta->execute();			
            return $consulta->fetchAll(PDO::FETCH_CLASS, "venta");
        }
        else
        {
            return NULL;
        }
    }
    
    public static function TraerUsuarioConProductoComprado()
    {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT producto.nombre as producto, usuario.nombre as usuario
                                                            FROM usuario 
                                                            INNER JOIN venta ON usuario.id = venta.id_usuario
                                                            INNER JOIN producto ON producto.id = venta.id_producto");
            $consulta->execute();			
            return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
    
    public static function TraerTotalesPorVenta()
    {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT venta.cantidad * producto.precio
                                                            AS totales
                                                            FROM venta
                                                            JOIN producto ON producto.id = venta.id_producto");
            $consulta->execute();			
            return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public static function TraerTotalProductoPorUsuario($idProducto, $idUsuario)
    {
        if(is_numeric($idProducto) && is_numeric($idUsuario))
        {    
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT SUM(cantidad)
                                                            AS total1003
                                                            FROM venta
                                                            WHERE venta.id_producto = $idProducto and venta.id_usuario = $idUsuario");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }
        else
        {
            return NULL;
        }
    }

    public static function TraerProductosVendidosSegunLocalidad($localidad)
    {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT venta.id_producto
                                                            FROM venta
                                                            INNER JOIN usuario ON usuario.id = venta.id_usuario
                                                            WHERE usuario.localidad = :localidad");
            $consulta->bindValue(':localidad', $localidad, PDO::PARAM_STR);
            $consulta->execute();			
            return $consulta->fetchAll(PDO::FETCH_CLASS, "venta");
    } 



///

}




?>