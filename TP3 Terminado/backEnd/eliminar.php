<?php
include_once "./empleado.php";
include_once "./fabrica.php";
$auxLegajo = $_GET["legajo"];
$flag=true;
echo "<table align='center' border='0'>
<tr>
<td></td>
<td colspan='2'><h1>Eliminar Empleado</h1></td>
<td></td>
</tr>
<tr>
<td></td>
<td colspan='2'><a href='./mostrar.php'>Mostrar Empleados</a> <br></td>
<td></td>
</tr>
<tr>
<td></td>
<td colspan='2'><a href='../index.html'>Formulario Principal</a> <br></td>
<td></td>
</tr>";
$archivo = fopen("../archivos/empleados.txt","r");
while(!feof($archivo))
{
    $archAux = fgets($archivo);
    $empl = explode("-", $archAux);
    if($auxLegajo == $empl[4])
    {
            $empleado = new Empleado($empl[0],$empl[1],$empl[2],$empl[3],$empl[4],$empl[5],$empl[6]);
            $fabrica = new Fabrica("Fattori S.A",7);
            $fabrica->TraerDeArchivo("../archivos/empleados.txt");
            $aux=$fabrica->EliminarEmpleado($empleado);
            if($aux)
            {
                $fabrica->GuardarEnArchivo("../archivos/empleados.txt");
                echo "<tr>
                <td></td>
                <td colspan='2'>Se pudo eliminar el empleado: &nbsp". $empleado->ToString() ."<br></td>
                <td></td>
                </tr>";
                $flag=false;
                break;
            }
            else
            {
                echo "<tr>
                <td></td>
                <td colspan='2'>No se pudo eliminar el empleado" . $empleado->ToString()."<br></td>
                <td></td>
                </tr>";
            }
    }
}
if($flag)
{
    echo "<tr>
    <td></td>
    <td colspan='2'>No se encontro el legajo en el archivo de empleados <br></td>
    <td></td>
    </tr>";
}
fclose($archivo);
echo "</tabla>";
?>



