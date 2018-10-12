<?php
session_start();
$apellido = $_POST["txtApellido"];
$dni = $_POST["txtDni"];
$flag = true;
$archivo = fopen("../archivos/empleados.txt","r");
while(!feof($archivo))
{
    $archAux = fgets($archivo);
    $aux= trim($archAux);
    if($aux != "")
    {
        $empleado = explode("-", $archAux);
        if($empleado[1]==$apellido && $empleado[2]==$dni)
        {
            $_SESSION["DNIEmpleado"]=$dni;
            $flag=false;
            header('location: ./mostrar.php');
        }
    }
}
if($flag)
{
    echo "No se encuentra el empleado en el archivo de texto";
    echo "<a href=../login.html>Volver a login</a>";
}
?>