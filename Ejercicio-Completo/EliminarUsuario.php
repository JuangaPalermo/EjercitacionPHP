<?php

require_once "./usuario.php";

if (isset($_POST["nombre"]) && isset($_POST["clave"]) && isset($_POST["mail"]))
{
    $nombre = $_POST["nombre"];
    $clave = $_POST["clave"];
    $mail = $_POST["mail"];

    $usuario = Usuario::__crearUsuarioLogin($mail, $clave);
    
    $usuariosBase = Usuario::TraerTodosLosUsuarios();

    $validacion = $usuario -> LogeoUsuario($usuariosBase);

    if ($validacion == "Usuario verificado.")
    {
        $usuario->EliminarUsuario();
        echo "Usuario eliminado correctamente";
    }
    else
    {
        echo $validacion;
    }
}
else
{
    echo "Error en los parametros";
}

?>