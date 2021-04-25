<?php

require_once "./usuario.php";

if (isset($_POST["nombre"]) && isset($_POST["clave_nueva"]) && isset($_POST["clave_vieja"]) && isset($_POST["mail"]))
{
    $nombre = $_POST["nombre"];
    $claveNueva = $_POST["clave_nueva"];
    $claveVieja = $_POST["clave_vieja"];
    $mail = $_POST["mail"];

    $usuario = Usuario::__crearUsuarioLogin($mail, $claveVieja);
    
    $usuariosBase = Usuario::TraerTodosLosUsuarios();

    $validacion = $usuario -> LogeoUsuario($usuariosBase);

    if ($validacion == "Usuario verificado.")
    {
        $usuario->ModificarUsuarioParametros($claveNueva);
        echo "Contraseña modificada correctamente";
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