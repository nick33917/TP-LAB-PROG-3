<?php
include_once "./empleado.php";
include_once "./fabrica.php";
//include_once "./persona.php";
$empl1 = new Empleado("nicolas","fattori",38839471,"M",150,17000,"noche");
$empl2 = new Empleado("juan","figueiras",39000252,"M",153,19000,"mañana");
$empl3 = new Empleado("patricia","castaldo",20954997,"F",140,20000,"tarde");
$empl4 = new Empleado("jose","castaldo",20854997,"F",300,20000,"tarde");
$arrayLenguaje = array("Español",",Ingles",",Frances");
/*
echo $empl1->ToString();
echo $empl1->Hablar($arrayLenguaje);
$arrayEmpl = array($empl1);
*/
$fabric = new Fabrica("FATTORI S.A",5);
/*
$fabric->AgregarEmpleado($empl1);
$fabric->AgregarEmpleado($empl2);
$fabric->AgregarEmpleado($empl3);
$fabric->AgregarEmpleado($empl4);
/*
echo "--------------------------------<br><br>";
if($fabric->EliminarEmpleado($empl2))
{
    echo "Se elimino correctamente el empleado";
}
echo "--------------------------------<br><br>";

echo $fabric->ToString();
echo "--------------------------------<br><br>";
*/

$fabric->GuardarEnArchivo("../archivos/empleados.txt");
$fabric->TraerDeArchivo("../archivos/empleados.txt");



/*
if($fabric->AgregarEmpleado($empl1) )
{
    echo "Se agrego correctamente el empleado";
}
else
{
    echo "No se agrego el empleado ";
}
*/

?>