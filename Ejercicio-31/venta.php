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

///

}




?>