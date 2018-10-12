<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../javascript/funciones.js"></script>
    <title>listado de Empleados</title>
</head>
<body>
<form action='./index.php' id='formMostrar' method='POST' enctype="multipart/form-data">
    <h2>Listado de Empleados </h2>
    <table align="center" border="0">
    <input type='hidden' id='idHidden' name='DNIEmpleado'>
        <tr>
            <td><h4>Info</h4></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>
        <tr>
            <td colspan=4><hr></td>
        </tr>

    <?php
        session_start();
        include_once "./empleado.php";
        include_once "./fabrica.php";
        include_once "./validarSesion.php";
        $fabrica = new Fabrica("Fattori S.A",7);
        $fabrica->TraerDeArchivo("../archivos/empleados.txt");
    
    foreach($fabrica->GetEmpleados() as $empl)
    {
        //$dni=$empl->GetDni();
        /*echo '<tr>
             <td>'.$empl->ToString().'</td>
             <td><img src="'.$empl->GetPathFoto().'"width="90px" height="90px"></td>
             <td><a href="./eliminar.php?legajo='.$empl->GetLegajo().'">Eliminar</a></td>
             <td><input type="button" onclick="AdministrarModificar("'.$dni.'")>Modificar</td>
             </tr>';*/
        echo     "
            <tr>
                <td>" . $empl->ToString() . "</td>" .
            "<td><img src=" . $empl->GetPathFoto() . " width='90px' height='90px'> </img></td>
                <td><a href='eliminar.php?legajo=" . $empl->GetLegajo() . "'>Eliminar</a>
                <input type='button' name='btnModificar' value='Modificar' onclick='AdministrarModificar(" . $empl->GetDni() . ")'></td>                
            </tr>";
    }      
 /*   echo "
    <tr>
        <td>" . $empleado->__toString() . "</td>" .
    "<td><img src=" . $empleado->GetPathFoto() . " width='90px' height='90px'> </img></td>
        <td><a href='eliminar.php?legajo=" . $empleado->GetLegajo() . "'>Eliminar</a>
        <input type='button' name='btnModificar' value='Modificar' onclick='AdministrarModificar(" . $empleado->GetDni() . ")'></td>                
    </tr>";
*/
    ?>
    <tr>
            <td colspan=3><hr></td>
    </tr>
    </table>
    <br>
    <br>
    <a href='./index.php'>Alta de Empleados</a>
    <a href='./cerrarSesion.php'>Desloguiarme</a>

</form>
</body>
</html>
