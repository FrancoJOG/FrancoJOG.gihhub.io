<?php 
include("conexion.php");

$nombre= $_POST["nombre"];
$correo= $_POST["correo"];
$pass= $_POST["contraseña"];



//login
if(isset($_POST["btn_login"])){
    
    $query = mysqli_query($conn,"SELECT * FROM usuarios WHERE CORREO = '$correo' AND `CONTRASEÑA`='$pass'");
    $nr = mysqli_num_rows($query);
    

    if($nr==1){
        echo "<script> alert('Bienvenido $correo'); window.location='INDEX.html' </script>";
    }else
    {
        echo "<script> alert('usuario no existente'); window.location='loginvista.html' </script>";
    }
}


//registro
if(isset($_POST["btn_registro"])){
$sqlgrabar = "INSERT INTO usuarios(NOMBRE,CORREO,CONTRASEÑA) values ('$nombre','$correo','$pass')";

if(mysqli_query($conn,$sqlgrabar)){
    echo "<script> alert('Usuario registrado con exito: $nombre'); window.location='loginvista.html' </script>";
}else
{
    echo "Error: ".$sql."<br>".mysql_error($conn);
}
}

?>