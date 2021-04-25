<?php


require "usuario.php";

///registra un nuevo usuario, y lo guarda en el archivo CSV.
if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['clave']) && isset($_POST['mail']) && isset($_POST['localidad']))
{
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $clave = $_POST['clave'];
    $mail = $_POST['mail'];
    $localidad = $_POST['localidad'];
    
    $usuario = Usuario:: __crearUsuarioParametros($nombre, $apellido, $clave, $mail, $localidad);
    $usuario->GuardarCSV();

    echo "Se ha guardado el usuario correctamente";
}
else
{
    echo "error en los parametros";
}

///registra un nuevo usuario, y lo guarda en el archivo JSON.
if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['clave']) && isset($_POST['mail']) && isset($_POST['localidad']) && $_FILES["imagen"])
{
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $clave = $_POST['clave'];
    $mail = $_POST['mail'];
    $localidad = $_POST['localidad'];

    $usuario = Usuario:: __crearUsuarioParametros($nombre, $apellido, $clave,$mail,$localidad);

    $nombreImagen = $mail . $_FILES["imagen"]["name"];

    $destino = "Usuario/Fotos/".$nombreImagen;

    move_uploaded_file($_FILES["imagen"]["tmp_name"], $destino);

    $usuario->SetPathImagen($destino);
    
    $usuario->GuardarJson();

    /*esto es para que impacte en la BD
        $ultimoId = $usuario->InsertarUsuarioParametros();
        $usuario->SetId($ultimoId);
    */

    echo "Se ha guardado el usuario correctamente";
}
else
{
    echo "error en los parametros";
}

///registra un nuevo usuario y lo envia a la base de datos
if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['clave']) && isset($_POST['mail']) && isset($_POST['localidad']))
{
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $clave = $_POST['clave'];
    $mail = $_POST['mail'];
    $localidad = $_POST['localidad'];

    $usuario = Usuario:: __crearUsuarioParametros($nombre, $apellido, $clave,$mail,$localidad);

    $ultimoId = $usuario->InsertarUsuarioParametros();
    $usuario->SetId($ultimoId);

    echo "Se ha creado el usuario con el ID numero " . $ultimoId;
}
else
{
    echo "error en los parametros";
}

?>
