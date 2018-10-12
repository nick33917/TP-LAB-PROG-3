<?php
include_once "./empleado.php";
include_once "./fabrica.php";
$fabrica = new Fabrica("Fattori S.A",7);
$fabrica->TraerDeArchivo("../archivos/empleados.txt");
$empl = new Empleado($_POST["txtNombre"],$_POST["txtApellido"],$_POST["txtDni"],$_POST["cboSexo"],$_POST["txtLegajo"],$_POST["txtSueldo"],$_POST["rdoTurno"]);
$foto=$_FILES["archivo"]["name"];
$extension = pathinfo($foto,PATHINFO_EXTENSION);
$aux = false;
$flag=false;
//var_dump($_POST["hdnModificar"]);
if(isset($_POST["hdnModificar"]))
{
    foreach($fabrica->GetEmpleados() as $empleado)
    {
        if($empleado->GetDni() == $_POST["hdnModificar"])
        {
            $fabrica->EliminarEmpleado($empleado);
           // $flag=true;
            break;
        }
    }
}
if($extension=="jpg" || $extension=="bmp" || $extension=="gif" || $extension=="png" || $extension=="jpeg")
{
    if($_FILES["archivo"]["size"]<1000000)
    {
        $pathFoto ="../fotos/".$_POST["txtDni"]."_".$_POST["txtApellido"].".".$extension;
        if($flag || !file_exists($pathFoto))
        {
            move_uploaded_file($_FILES["archivo"]["tmp_name"],$pathFoto);
            echo "se pudo guardar exitosamente la foto<br>";
            $empl->SetPathFoto($pathFoto);
            $aux= $fabrica->AgregarEmpleado($empl);
             
        }
        else
        {
            echo "la foto ya existe<br>";
        }
    }
    else
    {
        echo "el tamaño de la foto es mas grande de lo permitido<br>";
    }
}
else
{
    echo "el tipo de foto no es valido<br>";
}



if($aux)
{
    $fabrica->GuardarEnArchivo("../archivos/empleados.txt");
    echo "<br><a href='./Mostrar.php'>Ir a mostrar.php</a>";

}
else
{
    echo "No se puedo agregar el empleado a la fabrica <br>";
    echo "<br><a href='../index.php'>Ir a index.html</a>";

}



